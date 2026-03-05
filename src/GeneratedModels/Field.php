<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Field extends BaseModel
{
    public function __construct(
        public ?string $title = null,
        public ?string $value = null,
        public ?bool $short = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
