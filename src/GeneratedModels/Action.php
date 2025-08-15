<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Action extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?string $style = null,
        public ?string $value = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
