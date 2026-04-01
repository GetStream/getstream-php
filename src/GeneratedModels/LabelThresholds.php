<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LabelThresholds extends BaseModel
{
    public function __construct(
        public ?float $flag = null, // Threshold for automatic message flag
        public ?float $block = null, // Threshold for automatic message block
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
