<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Policy extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?array $resources = null,
        public ?array $roles = null,
        public ?int $action = null,
        public ?bool $owner = null,
        public ?int $priority = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
