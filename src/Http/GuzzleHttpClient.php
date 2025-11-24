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

    /**
     * Create a new GuzzleHttpClient.
     *
     * @param array $config Guzzle client configuration
     */
    public function __construct(array $config = [])
    {
        $defaultConfig = [
            'timeout' => 30,
            'connect_timeout' => 10,
            'http_errors' => false, // We'll handle errors ourselves
        ];

        $this->client = new GuzzleClient(array_merge($defaultConfig, $config));
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
                if (is_array($body) || is_object($body)) {
                    $options['json'] = $body;
                } else {
                    $options['body'] = $body;
                }
            }

            $response = $this->client->request($method, $url, $options);

            return $this->createStreamResponse($response);
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
            echo 'HTTP Error: ' . $e->getMessage();

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

            if (is_array($data)) {
                $message = $data['message'] ?? $data['error'] ?? $message;
                $errorDetails = $data;
            }

            throw new StreamApiException($message, $statusCode, $rawBody, $errorDetails);
        }

        return $streamResponse;
    }
}
