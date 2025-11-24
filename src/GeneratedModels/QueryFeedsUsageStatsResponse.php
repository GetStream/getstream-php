<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryFeedsUsageStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?DailyMetricStatsResponse $activities = null,
        public ?DailyMetricStatsResponse $apiRequests = null,
        public ?DailyMetricStatsResponse $follows = null,
        public ?DailyMetricStatsResponse $openaiRequests = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
