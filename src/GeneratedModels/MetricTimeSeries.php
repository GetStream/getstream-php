<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class MetricTimeSeries extends BaseModel
{
    public function __construct(
        public ?array $dataPoints = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
