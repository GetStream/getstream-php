<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Result of tracking a single metric event
 */
class TrackActivityMetricsEventResult extends BaseModel
{
    public function __construct(
        public ?string $activityID = null, // The activity ID from the request
        public ?string $metric = null, // The metric name from the request
        public ?bool $allowed = null, // Whether the metric was counted (false if rate-limited)
        public ?string $error = null, // Error message if processing failed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
