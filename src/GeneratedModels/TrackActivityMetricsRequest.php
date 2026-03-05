<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Batch request to track metric events for activities. Rate-limited per user/IP per activity per metric.
 */
class TrackActivityMetricsRequest extends BaseModel
{
    public function __construct(
        /** @var array<TrackActivityMetricsEvent>|null */
        #[ArrayOf(TrackActivityMetricsEvent::class)]
        public ?array $events = null, // List of metric events to track (max 100 per request)
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
