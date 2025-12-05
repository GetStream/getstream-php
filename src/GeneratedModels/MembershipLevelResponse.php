<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $name
 * @property int $priority
 * @property \DateTime $updatedAt
 * @property array $tags
 * @property string|null $description
 * @property object|null $custom
 */
class MembershipLevelResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // When the membership level was created
        public ?string $id = null, // Unique identifier for the membership level
        public ?string $name = null, // Display name for the membership level
        public ?int $priority = null, // Priority level
        public ?\DateTime $updatedAt = null, // When the membership level was last updated
        public ?array $tags = null, // Activity tags this membership level gives access to
        public ?string $description = null, // Description of the membership level
        public ?object $custom = null, // Custom data for the membership level
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
