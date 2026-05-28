<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Thrown when the Stream API returns an HTTP 4xx or 5xx response carrying an
 * `APIError` envelope, or when an HTTP response was received but the body
 * could not be parsed as `APIError`.
 *
 * Inherited from `\Exception`:
 *   getMessage(): string  — `APIError.message`
 *   getCode(): int        — `APIError.code` (NOT the HTTP status)
 *   getPrevious(): ?\Throwable  — underlying cause (e.g. JSON parse error)
 */
class StreamApiException extends StreamException
{
    private int $statusCode;
    /** @var array<string, string> */
    private array $exceptionFields;
    private bool $unrecoverable;
    private string $rawResponseBody;
    private ?string $moreInfo;
    private mixed $details;

    /**
     * @param string         $message         APIError.message
     * @param int            $statusCode      HTTP status (e.g. 400, 404, 500)
     * @param int            $code            APIError.code
     * @param array<string, string> $exceptionFields APIError.exception_fields (empty when not validation)
     * @param bool           $unrecoverable   APIError.unrecoverable
     * @param string         $rawResponseBody Raw HTTP response body
     * @param string|null    $moreInfo        APIError.more_info
     * @param mixed          $details         APIError.details
     * @param \Throwable|null $previous       Cause-chain link (e.g. JSON parse error)
     */
    public function __construct(
        string $message,
        int $statusCode,
        int $code = 0,
        array $exceptionFields = [],
        bool $unrecoverable = false,
        string $rawResponseBody = '',
        ?string $moreInfo = null,
        mixed $details = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
        $this->statusCode = $statusCode;
        $this->exceptionFields = $exceptionFields;
        $this->unrecoverable = $unrecoverable;
        $this->rawResponseBody = $rawResponseBody;
        $this->moreInfo = $moreInfo;
        $this->details = $details;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array<string, string>
     */
    public function getExceptionFields(): array
    {
        return $this->exceptionFields;
    }

    public function isUnrecoverable(): bool
    {
        return $this->unrecoverable;
    }

    public function getRawResponseBody(): string
    {
        return $this->rawResponseBody;
    }

    public function getMoreInfo(): ?string
    {
        return $this->moreInfo;
    }

    public function getDetails(): mixed
    {
        return $this->details;
    }
}
