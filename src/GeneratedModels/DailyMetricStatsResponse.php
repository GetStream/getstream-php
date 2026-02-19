<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DailyMetricStatsResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyMetricResponse>|null */
        #[ArrayOf(DailyMetricResponse::class)]
        public ?array $daily = null, // Array of daily metric values
        public ?int $total = null, // Total value across all days in the date range
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
