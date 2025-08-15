<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Role extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?bool $custom = null,    // Whether this is a custom role or built-in 
        public ?string $name = null,    // Unique role name 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?array $scopes = null,    // List of scopes where this role is currently present. `.app` means that role is present in app-level grants 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
