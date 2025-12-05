<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $action
 * @property \DateTime $createdAt
 * @property string $name
 * @property bool $owner
 * @property int $priority
 * @property \DateTime $updatedAt
 * @property array $resources
 * @property array $roles
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
