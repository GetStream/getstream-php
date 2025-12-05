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
 * @property string $userID
 * @property string $userSessionID
 * @property array<CallParticipantTimeline> $events
 */
class QueryCallSessionParticipantStatsTimelineResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $userID = null,
        public ?string $userSessionID = null,
        /** @var array<CallParticipantTimeline>|null */
        #[ArrayOf(CallParticipantTimeline::class)]
        public ?array $events = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
