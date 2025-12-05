<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $block
 * @property int|null $flag
 */
class LabelThresholds extends BaseModel
{
    public function __construct(
        public ?int $block = null, // Threshold for automatic message block
        public ?int $flag = null, // Threshold for automatic message flag
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
