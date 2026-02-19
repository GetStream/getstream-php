<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedsUsageStatsResponse extends BaseModel
{
    public function __construct(
        public ?DailyMetricStatsResponse $activities = null,
        public ?DailyMetricStatsResponse $apiRequests = null,
        public ?DailyMetricStatsResponse $follows = null,
        public ?DailyMetricStatsResponse $openaiRequests = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
