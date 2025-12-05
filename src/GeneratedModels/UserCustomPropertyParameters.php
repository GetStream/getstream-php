<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $operator
 * @property string|null $propertyKey
 */
class UserCustomPropertyParameters extends BaseModel
{
    public function __construct(
        public ?string $operator = null,
        public ?string $propertyKey = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
