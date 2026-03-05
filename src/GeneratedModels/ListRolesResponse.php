<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class ListRolesResponse extends BaseModel
{
    public function __construct(
        /** @var array<Role>|null */
        #[ArrayOf(Role::class)]
        public ?array $roles = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
