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
        public ?string $metric = null, // The metric name (e.g. views, clicks, impressions, dwell). Alphanumeric and underscores only. dwell requires dwell_ms.
        public ?int $delta = null, // The amount to increment (positive) or decrement (negative). Defaults to 1. The absolute value counts against rate limits.
        public ?string $requestID = null, // The request_id returned by the feed read that showed the activity. An invalid, expired (older than 48h) or future-dated (more than 5 minutes ahead) value fails only this event. Impressions sent with a valid request_id must use a delta of 1 and feed For You engagement analytics. In apps that use feed impressions (exploration or impressions_bucket) they feed ranking and are not added to the activity's metrics.impressions; with For You analytics on and no feed impressions they are added as without a request_id.
        public ?int $position = null, // 1-based position of the activity in that feed read. A value below 1 fails only this event. Accepted but not stored yet.
        public ?int $dwellMs = null, // Milliseconds the activity was in view. Required for the built-in dwell metric; apps with a custom dwell metric keep their own behavior.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
