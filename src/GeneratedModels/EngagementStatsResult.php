<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EngagementStatsResult extends BaseModel
{
    public function __construct(
        public ?string $groupID = null,
        public ?string $viewID = null,
        public ?string $experimentID = null, // Empty outside an experiment
        /** @var array<string, DailyMetricStatsResponse>|null */
        #[MapOf(DailyMetricStatsResponse::class)]
        public ?array $metrics = null, // Daily values and total per metric: reads, users, impressions, clicks, dwell_ms, dwell_count, hides. users.total counts user-days
        public ?EngagementRates $rates = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
