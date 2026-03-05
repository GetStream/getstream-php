<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class OverviewDashboardConfig extends BaseModel
{
    public function __construct(
        public ?array $visibleCharts = null,
        public ?int $defaultDateRangeDays = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
