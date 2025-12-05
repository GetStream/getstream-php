<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $inclusive
 * @property int $value
 */
class Bound extends BaseModel
{
    public function __construct(
        public ?bool $inclusive = null,
        public ?int $value = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
