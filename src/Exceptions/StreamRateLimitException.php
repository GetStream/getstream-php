<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Thrown when the Stream API returns HTTP 429. Carries the parsed
 * `Retry-After` header (integer seconds; `null` if header missing or
 * unparseable).
 *
 * Auto-retry is off by default. Enable the opt-in policy with
 * `ClientBuilder::retry(new RetryConfig(enabled: true))`; it retries only
 * GET/HEAD requests, honoring this exception's `getRetryAfter()` value.
 * Compose your own strategy from `getRetryAfter()` if you need anything
 * richer.
 */
class StreamRateLimitException extends StreamApiException
{
    private ?int $retryAfter;

    /**
     * @param string         $message         APIError.message
     * @param int            $statusCode      HTTP status (typically 429)
     * @param int            $code            APIError.code
     * @param array<string, string> $exceptionFields APIError.exception_fields
     * @param bool           $unrecoverable   APIError.unrecoverable
     * @param string         $rawResponseBody Raw HTTP response body
     * @param string|null    $moreInfo        APIError.more_info
     * @param mixed          $details         APIError.details
     * @param int|null       $retryAfter      Parsed `Retry-After` header, seconds
     * @param \Throwable|null $previous       Cause-chain link
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
        ?int $retryAfter = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct(
            $message,
            $statusCode,
            $code,
            $exceptionFields,
            $unrecoverable,
            $rawResponseBody,
            $moreInfo,
            $details,
            $previous,
        );
        $this->retryAfter = $retryAfter;
    }

    /**
     * Parsed `Retry-After` response header in integer seconds.
     * Returns `null` when the header is absent or unparseable.
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }
}
