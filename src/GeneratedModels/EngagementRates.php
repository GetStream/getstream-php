<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EngagementRates extends BaseModel
{
    public function __construct(
        public ?float $ctr = null, // clicks / impressions
        public ?float $avgDwellMs = null, // dwell_ms / dwell_count, in milliseconds
        public ?float $hideRate = null, // hides / impressions
        public ?float $impressionsPerUser = null, // impressions / users (user-days)
        public ?float $clicksPerUser = null, // clicks / users (user-days)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
