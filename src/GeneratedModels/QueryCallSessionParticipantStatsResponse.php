<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class QueryCallSessionParticipantStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?array $participants = null,
        public ?CallStatsParticipantCounts $counts = null,
        public ?\DateTime $callEndedAt = null,
        public ?\DateTime $callStartedAt = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $tmpDataSource = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
