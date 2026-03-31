<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AggregationConfig extends BaseModel
{
    public function __construct(
        public ?string $format = null, // Format for activity aggregation
        public ?string $scoreStrategy = null, // Strategy for computing aggregated group scores from member activity scores when ranking is enabled. Valid values: sum, max, avg
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
