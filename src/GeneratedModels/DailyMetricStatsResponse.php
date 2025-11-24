<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DailyMetricStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null,    // Total value across all days in the date range 
        public ?array $daily = null,    // Array of daily metric values 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
