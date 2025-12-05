<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $total
 * @property array<DailyMetricResponse> $daily
 */
class DailyMetricStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null, // Total value across all days in the date range
        /** @var array<DailyMetricResponse>|null Array of daily metric values */
        #[ArrayOf(DailyMetricResponse::class)]
        public ?array $daily = null, // Array of daily metric values
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
