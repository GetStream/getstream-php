<?php

declare(strict_types=1);

namespace GetStream\Http;

/**
 * Opt-in auto-retry policy. Disabled by default: the client performs exactly
 * one attempt and surfaces errors unchanged. When enabled, only GET/HEAD
 * requests failing with HTTP 429 (and not marked unrecoverable) or a
 * transport error are retried, honoring `Retry-After` when present and
 * falling back to exponential backoff with full jitter otherwise.
 */
final class RetryConfig
{
    public function __construct(
        public readonly bool $enabled = false,
        public readonly int $maxAttempts = 3,
        public readonly float $maxBackoff = 30.0,
    ) {
        if ($maxAttempts < 1) {
            throw new \InvalidArgumentException("maxAttempts must be >= 1, got {$maxAttempts}");
        }
        if ($maxBackoff < 0) {
            throw new \InvalidArgumentException("maxBackoff must be >= 0, got {$maxBackoff}");
        }
    }
}
