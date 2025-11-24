<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class QueryCallSessionParticipantStatsTimelineResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?array $events = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
