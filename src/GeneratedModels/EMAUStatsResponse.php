<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EMAUStatsResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyMetricResponse>|null */
        #[ArrayOf(DailyMetricResponse::class)]
        public ?array $daily = null, // Per-day unique engaged user counts
        /** @var array<DailyMetricResponse>|null */
        #[ArrayOf(DailyMetricResponse::class)]
        public ?array $last30Days = null, // Rolling 30-day engaged user count snapshots
        /** @var array<DailyMetricResponse>|null */
        #[ArrayOf(DailyMetricResponse::class)]
        public ?array $monthToDate = null, // Calendar month-to-date engaged user count snapshots
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
