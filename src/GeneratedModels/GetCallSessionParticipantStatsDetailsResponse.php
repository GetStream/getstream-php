<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetCallSessionParticipantStatsDetailsResponse extends BaseModel
{
    public function __construct(
        public ?ParticipantSeriesPublisherStats $publisher = null,
        public ?ParticipantSeriesSubscriberStats $subscriber = null,
        public ?ParticipantSeriesTimeframe $timeframe = null,
        public ?ParticipantSeriesUserStats $user = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $callType = null,
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $userID = null,
        public ?string $userSessionID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
