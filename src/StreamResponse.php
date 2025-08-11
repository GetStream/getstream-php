<?php

declare(strict_types=1);

namespace GetStream;

/**
 * Represents a response from the GetStream API
 */
class StreamResponse
{
    private int $statusCode;
    private array $headers;
    private mixed $data;
    private ?string $rawBody;

    /**
     * Create a new StreamResponse
     *
     * @param int $statusCode HTTP status code
     * @param array $headers Response headers
     * @param mixed $data Parsed response data
     * @param string|null $rawBody Raw response body
     */
    public function __construct(int $statusCode, array $headers, mixed $data, ?string $rawBody = null)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->data = $data;
        $this->rawBody = $rawBody;
    }

    /**
     * Get the HTTP status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get the response headers
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Get a specific header value
     */
    public function getHeader(string $name): ?string
    {
        return $this->headers[strtolower($name)] ?? null;
    }

    /**
     * Get the parsed response data
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * Get the raw response body
     */
    public function getRawBody(): ?string
    {
        return $this->rawBody;
    }

    /**
     * Check if the response was successful (2xx status code)
     */
    public function isSuccessful(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * Get the response as an array
     */
    public function toArray(): array
    {
        return [
            'status_code' => $this->statusCode,
            'headers' => $this->headers,
            'data' => $this->data,
        ];
    }
}
