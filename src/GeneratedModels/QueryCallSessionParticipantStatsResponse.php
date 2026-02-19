<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class QueryCallSessionParticipantStatsResponse extends BaseModel
{
    public function __construct(
        public ?CallStatsParticipantCounts $counts = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $callType = null,
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?\DateTime $callStartedAt = null,
        public ?\DateTime $callEndedAt = null,
        /** @var array<CallStatsParticipant>|null */
        #[ArrayOf(CallStatsParticipant::class)]
        public ?array $participants = null,
        public ?string $tmpDataSource = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
