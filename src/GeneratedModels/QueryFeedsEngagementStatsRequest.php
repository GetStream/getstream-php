<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedsEngagementStatsRequest extends BaseModel
{
    public function __construct(
        public ?string $groupID = null, // Feed group to report on
        public ?string $from = null, // Start date in YYYY-MM-DD format (optional, defaults to 29 days before to, so a 30-day range)
        public ?string $to = null, // End date in YYYY-MM-DD format (optional, defaults to today UTC). The range is at most 396 days
        public ?string $viewID = null, // Only this view (optional)
        public ?string $experimentID = null, // Only this experiment (optional)
        public ?int $limit = null, // Maximum number of series (one per group, view and experiment), not rows, 1 to 100 (optional, defaults to 100, or 10,000 / days for ranges over 100 days). The limit never cuts a series; a metric's days with no events are omitted from its daily values. limit x days must not exceed 10,000
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
