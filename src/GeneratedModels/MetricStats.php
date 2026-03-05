<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Statistics for a single metric with optional daily breakdown
 */
class MetricStats extends BaseModel
{
    public function __construct(
        /** @var array<DailyValue>|null */
        #[ArrayOf(DailyValue::class)]
        public ?array $daily = null, // Per-day values (only present in daily mode)
        public ?int $total = null, // Aggregated total value
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
