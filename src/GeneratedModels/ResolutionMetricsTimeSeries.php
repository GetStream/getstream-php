<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property MetricTimeSeries|null $height
 * @property MetricTimeSeries|null $width
 */
class ResolutionMetricsTimeSeries extends BaseModel
{
    public function __construct(
        public ?MetricTimeSeries $height = null,
        public ?MetricTimeSeries $width = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
