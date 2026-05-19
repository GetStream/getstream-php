<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchRolesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<Role>|null */
        #[ArrayOf(Role::class)]
        public ?array $roles = null, // Matching roles, sorted ascending by name
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
