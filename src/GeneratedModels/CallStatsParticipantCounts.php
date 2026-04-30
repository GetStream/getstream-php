<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsParticipantCounts extends BaseModel
{
    public function __construct(
        public ?int $participants = null,
        public ?int $sessions = null,
        public ?int $liveSessions = null,
        public ?int $publishers = null,
        public ?int $cqScore = null,
        public ?int $peakConcurrentUsers = null,
        public ?int $peakConcurrentSessions = null,
        public ?int $totalParticipantDuration = null,
        public ?int $sfusUsed = null,
        public ?int $averageJitterMs = null,
        public ?int $averageLatencyMs = null,
        public ?int $maxFreezesDurationMs = null,
        public ?int $callEventCount = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
