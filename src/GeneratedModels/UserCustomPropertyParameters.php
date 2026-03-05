<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserCustomPropertyParameters extends BaseModel
{
    public function __construct(
        public ?string $propertyKey = null,
        public ?string $operator = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
