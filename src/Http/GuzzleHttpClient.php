<?php

declare(strict_types=1);

namespace GetStream\Http;

use GetStream\Exceptions\StreamApiException;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamRateLimitException;
use GetStream\Exceptions\StreamTransportException;
use GetStream\StreamResponse;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle HTTP client implementation.
 */
class GuzzleHttpClient implements HttpClientInterface
{
    private GuzzleClient $client;

    /** Maximum number of retries for rate-limited (429) responses. */
    private int $maxRetries;

    /** @var PoolConfig Effective pool configuration (kept for diagnostics). */
    private PoolConfig $pool;

    /**
     * Create a new GuzzleHttpClient.
     *
     * @param array            $config     Guzzle client configuration (wins over $pool defaults)
     * @param int              $maxRetries Maximum retries for 429 rate-limit responses (default 3).
     *                                     A standardized cross-SDK retry policy is owned by CHA-2959.
     * @param PoolConfig|null  $pool       Connection pool configuration. When null, spec defaults apply.
     */
    public function __construct(array $config = [], int $maxRetries = 3, ?PoolConfig $pool = null)
    {
        $pool = $pool ?? new PoolConfig();

        // Persistent multi handle: routes every request (sync and async) through one
        // libcurl multi handle that holds a connection pool for the lifetime of this
        // GuzzleHttpClient instance. CURLMOPT_MAX_HOST_CONNECTIONS is a real per-host
        // concurrency cap inside the multi handle; CURLMOPT_MAXCONNECTS sizes the
        // multi handle's overall connection cache. Pooling takes effect only when this
        // instance is reused across requests (long-running runtimes: Swoole, RoadRunner,
        // ReactPHP, CLI daemons). Under PHP-FPM the PHP process exits per request and
        // the multi handle dies with it; the per-call request/connect timeouts still
        // apply but there is no cross-request connection reuse.
        $multi = new CurlMultiHandler([
            'options' => [
                CURLMOPT_MAX_HOST_CONNECTIONS => $pool->maxConnsPerHost,
                CURLMOPT_MAXCONNECTS => $pool->maxConnsPerHost,
            ],
        ]);
        $defaultHandler = HandlerStack::create($multi);

        $curlOptions = [
            CURLOPT_FORBID_REUSE => 0, // KeepAlive invariant: allow connection reuse.
        ];
        // CURLOPT_MAXLIFETIME_CONN (libcurl >= 7.80.0) caps how long a pooled connection
        // can be reused since it was created. We use it to recycle connections ahead of
        // the upstream load balancer's idle close window. If the constant is not present
        // on this PHP build, pooling still works without active lifetime capping.
        if (defined('CURLOPT_MAXLIFETIME_CONN')) {
            $curlOptions[\constant('CURLOPT_MAXLIFETIME_CONN')] = $pool->idleTimeout;
        }

        $defaultConfig = [
            'timeout' => $pool->requestTimeout,
            'connect_timeout' => $pool->connectTimeout,
            'http_errors' => false, // We handle errors ourselves.
            'handler' => $defaultHandler,
            'curl' => $curlOptions,
        ];

        // User-supplied $config wins. array_replace_recursive lets callers override the
        // handler (used by tests with MockHandler) or extend the curl options without
        // wiping our defaults.
        $merged = array_replace_recursive($defaultConfig, $config);

        $this->client = new GuzzleClient($merged);
        $this->maxRetries = $maxRetries;
        $this->pool = $pool;
    }

    /** Return the effective PoolConfig (for diagnostics / logging). */
    public function getPoolConfig(): PoolConfig
    {
        return $this->pool;
    }

    /**
     * Make an HTTP request.
     *
     * @param string $method  HTTP method
     * @param string $url     Full URL to request
     * @param array  $headers Request headers
     * @param mixed  $body    Request body
     * @param array  $options Per-call Guzzle option overrides (e.g. ['timeout' => 2])
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    public function request(
        string $method,
        string $url,
        array $headers = [],
        mixed $body = null,
        array $options = []
    ): StreamResponse {
        $requestOptions = [
            'headers' => $headers,
        ];

        // Per-call overrides. 'timeout' is the canonical key; any other valid
        // Guzzle key is also forwarded.
        foreach ($options as $key => $value) {
            $requestOptions[$key] = $value;
        }

        // Add body if provided
        if ($body !== null) {
            // Check if this is multipart form data (array of arrays with 'name' and 'contents')
            if (is_array($body) && !empty($body) && isset($body[0]) && is_array($body[0]) && isset($body[0]['name'])) {
                // This is multipart form data
                $requestOptions['multipart'] = $body;
            } elseif (is_array($body) || is_object($body)) {
                $requestOptions['json'] = $body;
            } else {
                $requestOptions['body'] = $body;
            }
        }

        // Retry loop for rate-limited (429) responses. The spec (§7) keeps
        // this behavior in place for the CHA-2958 rollout; a uniform retry
        // policy across all 6 SDKs is owned by CHA-2959.
        for ($attempt = 0;; $attempt++) {
            try {
                $response = $this->client->request($method, $url, $requestOptions);
            } catch (ClientException | ServerException $e) {
                // Reachable only if a caller flipped `http_errors` back to true.
                $response = $e->getResponse();
                if ($response === null) {
                    throw new StreamTransportException(
                        $e->getMessage(),
                        StreamTransportException::ERROR_TYPE_UNKNOWN,
                        $e,
                    );
                }
                return $this->createStreamResponse($response, $e);
            } catch (ConnectException $e) {
                throw new StreamTransportException(
                    $e->getMessage(),
                    self::mapConnectErrorType($e),
                    $e,
                );
            } catch (GuzzleException $e) {
                throw new StreamTransportException(
                    $e->getMessage(),
                    StreamTransportException::ERROR_TYPE_UNKNOWN,
                    $e,
                );
            }

            if ($response->getStatusCode() !== 429 || $attempt >= $this->maxRetries) {
                return $this->createStreamResponse($response);
            }

            // Parse Retry-After header or use exponential backoff. Jitter
            // desynchronizes parallel test processes to avoid stampedes.
            $retryAfter = $response->getHeaderLine('Retry-After');
            $sleepSeconds = $retryAfter !== '' ? (int) $retryAfter : ($attempt + 1);
            $sleepSeconds = min($sleepSeconds, 10);
            $jitter = random_int(0, max(1, (int) round($sleepSeconds * 0.3)));
            sleep($sleepSeconds + $jitter);
        }
    }

    /**
     * Create a StreamResponse from a Guzzle response. Throws a structured
     * StreamApiException (or rate-limit subclass) for any 4xx/5xx response.
     *
     * @param \Throwable|null $previous Cause-chain link when the caller already
     *                                  caught a Guzzle exception that exposed
     *                                  the response.
     *
     * @return StreamResponse<mixed>
     */
    private function createStreamResponse(ResponseInterface $response, ?\Throwable $previous = null): StreamResponse
    {
        $statusCode = $response->getStatusCode();
        $rawBody = $response->getBody()->getContents();

        // Convert headers to lowercase keys
        $headers = [];
        foreach ($response->getHeaders() as $name => $values) {
            $headers[strtolower($name)] = implode(', ', $values);
        }

        $data = null;
        $jsonParseError = null;
        if (!empty($rawBody)) {
            $contentType = $headers['content-type'] ?? '';
            if (str_contains($contentType, 'application/json')) {
                $data = json_decode($rawBody, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $jsonParseError = new \JsonException(json_last_error_msg(), json_last_error());
                    $data = null;
                }
            } else {
                $data = $rawBody;
            }
        }

        $streamResponse = new StreamResponse($statusCode, $headers, $data, $rawBody);

        if ($streamResponse->isSuccessful()) {
            // Success path: a JSON-content-type body that failed to parse is a
            // bug in either the server or our parser. Surface it.
            if ($jsonParseError !== null) {
                throw new StreamException(
                    'Failed to parse JSON response: ' . $jsonParseError->getMessage(),
                    0,
                    $jsonParseError,
                );
            }
            return $streamResponse;
        }

        throw $this->buildApiException($statusCode, $rawBody, $headers, $data, $jsonParseError ?? $previous);
    }

    /**
     * Build a StreamApiException (or StreamRateLimitException for 429) from a
     * non-2xx response. Falls back to the §6.3 "unparseable error response"
     * shape when the body is not a valid APIError envelope.
     */
    private function buildApiException(
        int $statusCode,
        string $rawBody,
        array $headers,
        mixed $data,
        ?\Throwable $previous,
    ): StreamApiException {
        $message = 'API request failed';
        $code = 0;
        $exceptionFields = [];
        $unrecoverable = false;
        $moreInfo = null;
        $details = null;
        $parsedEnvelope = false;

        // Best-effort fallback parse when Content-Type wasn't JSON.
        if (!is_array($data) && !empty($rawBody)) {
            $fallback = json_decode($rawBody, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($fallback)) {
                $data = $fallback;
            } elseif ($previous === null) {
                $previous = new \JsonException(json_last_error_msg(), json_last_error());
            }
        }

        if (is_array($data)) {
            $parsedEnvelope = true;
            if (isset($data['message']) && is_string($data['message'])) {
                $message = $data['message'];
            } elseif (isset($data['error']) && is_string($data['error'])) {
                $message = $data['error'];
            }
            if (isset($data['code']) && is_int($data['code'])) {
                $code = $data['code'];
            }
            $exceptionFields = self::normalizeExceptionFields($data['exception_fields'] ?? []);
            $unrecoverable = (bool) ($data['unrecoverable'] ?? false);
            if (isset($data['more_info']) && is_string($data['more_info'])) {
                $moreInfo = $data['more_info'];
            }
            $details = $data['details'] ?? null;
        }

        if (!$parsedEnvelope) {
            // §6.3: HTTP layer succeeded, body is unparseable as APIError.
            $message = 'failed to parse error response';
        }

        if ($statusCode === 429) {
            return new StreamRateLimitException(
                $message,
                $statusCode,
                $code,
                $exceptionFields,
                $unrecoverable,
                $rawBody,
                $moreInfo,
                $details,
                self::parseRetryAfter($headers['retry-after'] ?? null),
                $previous,
            );
        }

        return new StreamApiException(
            $message,
            $statusCode,
            $code,
            $exceptionFields,
            $unrecoverable,
            $rawBody,
            $moreInfo,
            $details,
            $previous,
        );
    }

    /**
     * @return array<string, string>
     */
    private static function normalizeExceptionFields(mixed $raw): array
    {
        if (!is_array($raw)) {
            return [];
        }
        $out = [];
        foreach ($raw as $key => $value) {
            if (!is_string($key)) {
                continue;
            }
            if (is_string($value)) {
                $out[$key] = $value;
            } elseif (is_scalar($value)) {
                $out[$key] = (string) $value;
            }
        }
        return $out;
    }

    /**
     * Parse `Retry-After` header (RFC 7231 §7.1.3): integer seconds or
     * HTTP-date. Returns `null` when header is absent or unparseable.
     * HTTP-date deltas are clamped to >= 0.
     */
    private static function parseRetryAfter(?string $header): ?int
    {
        if ($header === null) {
            return null;
        }
        $trimmed = trim($header);
        if ($trimmed === '') {
            return null;
        }
        if (ctype_digit($trimmed)) {
            return (int) $trimmed;
        }
        $timestamp = strtotime($trimmed);
        if ($timestamp === false) {
            return null;
        }
        $delta = $timestamp - time();
        return $delta < 0 ? 0 : $delta;
    }

    /**
     * Map a Guzzle ConnectException to a canonical transport-error type.
     * Uses libcurl errno when available; falls back to message inspection.
     */
    private static function mapConnectErrorType(ConnectException $e): string
    {
        $ctx = $e->getHandlerContext();
        $errno = is_array($ctx) && isset($ctx['errno']) ? (int) $ctx['errno'] : 0;

        switch ($errno) {
            case 6: // CURLE_COULDNT_RESOLVE_HOST
                return StreamTransportException::ERROR_TYPE_DNS_FAILURE;
            case 7: // CURLE_COULDNT_CONNECT
            case 55: // CURLE_SEND_ERROR
            case 56: // CURLE_RECV_ERROR
                return StreamTransportException::ERROR_TYPE_CONNECTION_RESET;
            case 28: // CURLE_OPERATION_TIMEDOUT
                return StreamTransportException::ERROR_TYPE_TIMEOUT;
            case 35: // CURLE_SSL_CONNECT_ERROR
            case 51: // CURLE_PEER_FAILED_VERIFICATION (legacy)
            case 60: // CURLE_PEER_FAILED_VERIFICATION
            case 77: // CURLE_SSL_CACERT_BADFILE
                return StreamTransportException::ERROR_TYPE_TLS_HANDSHAKE_FAILED;
        }

        $msg = strtolower($e->getMessage());
        if (str_contains($msg, 'could not resolve') || str_contains($msg, 'name or service not known')) {
            return StreamTransportException::ERROR_TYPE_DNS_FAILURE;
        }
        if (str_contains($msg, 'timed out') || str_contains($msg, 'timeout')) {
            return StreamTransportException::ERROR_TYPE_TIMEOUT;
        }
        if (str_contains($msg, 'ssl') || str_contains($msg, 'tls') || str_contains($msg, 'certificate')) {
            return StreamTransportException::ERROR_TYPE_TLS_HANDSHAKE_FAILED;
        }
        if (str_contains($msg, 'refused') || str_contains($msg, 'reset') || str_contains($msg, 'closed')) {
            return StreamTransportException::ERROR_TYPE_CONNECTION_RESET;
        }

        return StreamTransportException::ERROR_TYPE_UNKNOWN;
    }
}
