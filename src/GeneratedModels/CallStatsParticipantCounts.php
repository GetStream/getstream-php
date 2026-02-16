<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class CallStatsParticipantCounts extends BaseModel
{
    public function __construct(
        public ?int $liveSessions = null,
        public ?int $participants = null,
        public ?int $peakConcurrentSessions = null,
        public ?int $peakConcurrentUsers = null,
        public ?int $publishers = null,
        public ?int $sessions = null,
        public ?int $totalParticipantDuration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
