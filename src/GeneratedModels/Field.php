<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $short
 * @property string $title
 * @property string $value
 */
class Field extends BaseModel
{
    public function __construct(
        public ?bool $short = null,
        public ?string $title = null,
        public ?string $value = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
