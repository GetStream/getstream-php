<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DailyDigestCallSessionSummary extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?string $callSessionID = null,
        public ?string $sessionStartedAt = null,
        public ?string $sessionEndedAt = null,
        public ?CallStatsParticipantCounts $counts = null,
        public ?bool $hasDigest = null,
        public ?string $digestError = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
