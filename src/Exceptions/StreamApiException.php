<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Exception thrown when the GetStream API returns an error
 */
class StreamApiException extends StreamException
{
    private int $statusCode;
    private ?string $responseBody;
    private array $errorDetails;

    /**
     * Create a new StreamApiException
     *
     * @param string $message The exception message
     * @param int $statusCode HTTP status code
     * @param string|null $responseBody Raw response body
     * @param array $errorDetails Error details from the API
     */
    public function __construct(
        string $message,
        int $statusCode,
        ?string $responseBody = null,
        array $errorDetails = []
    ) {
        parent::__construct($message, $statusCode);
        $this->statusCode = $statusCode;
        $this->responseBody = $responseBody;
        $this->errorDetails = $errorDetails;
    }

    /**
     * Get the HTTP status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get the raw response body
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }

    /**
     * Get the error details from the API
     */
    public function getErrorDetails(): array
    {
        return $this->errorDetails;
    }
}
