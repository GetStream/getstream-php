<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $operator
 * @property string|null $role
 */
class UserRoleParameters extends BaseModel
{
    public function __construct(
        public ?string $operator = null,
        public ?string $role = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
