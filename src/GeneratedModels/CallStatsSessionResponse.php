<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsSessionResponse extends BaseModel
{
    public function __construct(
        public ?string $callType = null,
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?\DateTime $callStartedAt = null,
        public ?\DateTime $callEndedAt = null,
        public ?\DateTime $generatedAt = null,
        public ?CallStatsParticipantCounts $counts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
