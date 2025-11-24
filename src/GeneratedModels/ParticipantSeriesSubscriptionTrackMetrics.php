<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ParticipantSeriesSubscriptionTrackMetrics extends BaseModel
{
    public function __construct(
        public ?string $publisherUserID = null,
        public ?string $publisherName = null,
        public ?string $publisherUserSessionID = null,
        public ?array $tracks = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
