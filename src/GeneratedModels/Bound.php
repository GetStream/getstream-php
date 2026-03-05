<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Bound extends BaseModel
{
    public function __construct(
        public ?int $value = null,
        public ?bool $inclusive = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
