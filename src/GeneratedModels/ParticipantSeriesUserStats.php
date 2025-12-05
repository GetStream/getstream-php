<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array|null $metricsOrder
 * @property array|null $metrics
 * @property array|null $metricsMeta
 * @property array|null $thresholds
 */
class ParticipantSeriesUserStats extends BaseModel
{
    public function __construct(
        public ?array $metricsOrder = null,
        public ?array $metrics = null,
        public ?array $metricsMeta = null,
        public ?array $thresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
