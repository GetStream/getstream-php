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

    /**
     * Create a new GuzzleHttpClient.
     *
     * @param array $config     Guzzle client configuration
     * @param int   $maxRetries Maximum retries for 429 rate-limit responses (default 3)
     */
    public function __construct(array $config = [], int $maxRetries = 3)
    {
        $defaultConfig = [
            'timeout' => 30,
            'connect_timeout' => 10,
            'http_errors' => false, // We'll handle errors ourselves
        ];

        $this->client = new GuzzleClient(array_merge($defaultConfig, $config));
        $this->maxRetries = $maxRetries;
    }

    /**
     * Make an HTTP request.
     *
     * @param string $method  HTTP method
     * @param string $url     Full URL to request
     * @param array  $headers Request headers
     * @param mixed  $body    Request body
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    public function request(string $method, string $url, array $headers = [], mixed $body = null): StreamResponse
    {
        try {
            $options = [
                'headers' => $headers,
            ];

            // Add body if provided
            if ($body !== null) {
                // Check if this is multipart form data (array of arrays with 'name' and 'contents')
                if (is_array($body) && !empty($body) && isset($body[0]) && is_array($body[0]) && isset($body[0]['name'])) {
                    // This is multipart form data
                    $options['multipart'] = $body;
                } elseif (is_array($body) || is_object($body)) {
                    $options['json'] = $body;
                } else {
                    $options['body'] = $body;
                }
            }

            // Retry loop for rate-limited responses
            for ($attempt = 0;; $attempt++) {
                $response = $this->client->request($method, $url, $options);

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
