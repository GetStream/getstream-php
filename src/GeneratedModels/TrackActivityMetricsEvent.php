<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A single metric event to track for an activity
 */
class TrackActivityMetricsEvent extends BaseModel
{
    public function __construct(
        public ?string $activityID = null, // The ID of the activity to track the metric for
        public ?string $metric = null, // The metric name (e.g. views, clicks, impressions). Alphanumeric and underscores only.
        public ?int $delta = null, // The amount to increment (positive) or decrement (negative). Defaults to 1. The absolute value counts against rate limits.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
