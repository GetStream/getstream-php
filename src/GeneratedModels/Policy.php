<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Policy extends BaseModel
{
    public function __construct(
        public ?int $action = null,
        public ?\DateTime $createdAt = null,
        public ?string $name = null,
        public ?bool $owner = null,
        public ?int $priority = null,
        public ?\DateTime $updatedAt = null,
        public ?array $resources = null,
        public ?array $roles = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
