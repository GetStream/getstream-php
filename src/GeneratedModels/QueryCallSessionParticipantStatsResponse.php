<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $callID
 * @property string $callSessionID
 * @property string $callType
 * @property string $duration
 * @property array<CallStatsParticipant> $participants
 * @property CallStatsParticipantCounts $counts
 * @property \DateTime|null $callEndedAt
 * @property \DateTime|null $callStartedAt
 * @property string|null $next
 * @property string|null $prev
 * @property string|null $tmpDataSource
 */
class QueryCallSessionParticipantStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<CallStatsParticipant>|null */
        #[ArrayOf(CallStatsParticipant::class)]
        public ?array $participants = null,
        public ?CallStatsParticipantCounts $counts = null,
        public ?\DateTime $callEndedAt = null,
        public ?\DateTime $callStartedAt = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $tmpDataSource = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
