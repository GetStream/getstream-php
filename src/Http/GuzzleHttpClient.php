<?php

declare(strict_types=1);

namespace GetStream\Http;

use GetStream\Exceptions\StreamApiException;
use GetStream\Exceptions\StreamException;
use GetStream\StreamResponse;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
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
     * @param int              $maxRetries Maximum retries for 429 rate-limit responses (default 3)
     * @param PoolConfig|null  $pool       Connection pool configuration. When null, spec defaults apply.
     */
    public function __construct(array $config = [], int $maxRetries = 3, ?PoolConfig $pool = null)
    {
        $pool = $pool ?? new PoolConfig();

        $defaultConfig = [
            'timeout' => $pool->requestTimeout,
            'connect_timeout' => $pool->connectTimeout,
            'http_errors' => false, // We'll handle errors ourselves
            'curl' => [
                // Cap concurrent connections opened by curl's internal multi handle.
                // IdleTimeout has no direct Guzzle/curl analogue; honored only in
                // long-running runtimes. For PHP-FPM, idle sockets die with the
                // request. See the PHP-FPM note in the README/CHANGELOG.
                CURLOPT_MAXCONNECTS => $pool->maxConnsPerHost,
                CURLOPT_FORBID_REUSE => 0, // explicit: allow connection reuse (KeepAlive invariant)
            ],
        ];

        // User-supplied $config wins. array_replace_recursive preserves the
        // user's curl array while filling in defaults we set above.
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
        try {
            $requestOptions = [
                'headers' => $headers,
            ];

            // Per-call overrides. 'timeout' is the canonical key; any
            // other valid Guzzle key is also forwarded.
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

            // Retry loop for rate-limited responses
            for ($attempt = 0;; $attempt++) {
                $response = $this->client->request($method, $url, $requestOptions);

                if ($response->getStatusCode() !== 429 || $attempt >= $this->maxRetries) {
                    return $this->createStreamResponse($response);
                }

                // Parse Retry-After header or use exponential backoff with jitter
                // Jitter desynchronizes parallel test processes to avoid stampedes
                $retryAfter = $response->getHeaderLine('Retry-After');
                $sleepSeconds = $retryAfter !== '' ? (int) $retryAfter : ($attempt + 1);
                $sleepSeconds = min($sleepSeconds, 10);
                $jitter = random_int(0, max(1, (int) round($sleepSeconds * 0.3)));
                sleep($sleepSeconds + $jitter);
            }
        } catch (ClientException|ServerException $e) {
            $response = $e->getResponse();
            $streamResponse = $this->createStreamResponse($response);

            throw new StreamApiException(
                $e->getMessage(),
                $response->getStatusCode(),
                $streamResponse->getRawBody(),
                $streamResponse->getData() ?? []
            );
        } catch (GuzzleException $e) {
            throw new StreamException('HTTP request failed: ' . $e->getMessage(), $e->getCode());
        }
    }

    /**
     * Create a StreamResponse from a Guzzle response.
     *
     * @return StreamResponse<mixed>
     */
    private function createStreamResponse(ResponseInterface $response): StreamResponse
    {
        $statusCode = $response->getStatusCode();
        $rawBody = $response->getBody()->getContents();

        // Convert headers to lowercase keys
        $headers = [];
        foreach ($response->getHeaders() as $name => $values) {
            $headers[strtolower($name)] = implode(', ', $values);
        }

        // Parse JSON response
        $data = null;
        if (!empty($rawBody)) {
            $contentType = $headers['content-type'] ?? '';
            if (str_contains($contentType, 'application/json')) {
                $data = json_decode($rawBody, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new StreamException('Failed to parse JSON response: ' . json_last_error_msg());
                }
            } else {
                $data = $rawBody;
            }
        }

        $streamResponse = new StreamResponse($statusCode, $headers, $data, $rawBody);

        // Throw exception for error status codes
        if (!$streamResponse->isSuccessful()) {
            $message = 'API request failed';
            $errorDetails = [];

            // Try parsed JSON data first
            if (is_array($data)) {
                $message = $data['message'] ?? $data['error'] ?? $message;
                $errorDetails = $data;
            } elseif (!empty($rawBody)) {
                // Fallback: try parsing raw body as JSON even if content-type wasn't application/json
                $fallbackData = json_decode($rawBody, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($fallbackData)) {
                    $message = $fallbackData['message'] ?? $fallbackData['error'] ?? $message;
                    $errorDetails = $fallbackData;
                }
            }

            // Include HTTP status code in error message for better diagnostics
            $message = "Stream API error (HTTP {$statusCode}): {$message}";

            throw new StreamApiException($message, $statusCode, $rawBody, $errorDetails);
        }

        return $streamResponse;
    }
}
