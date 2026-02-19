<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MembershipLevelResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the membership level
        public ?string $name = null, // Display name for the membership level
        public ?string $description = null, // Description of the membership level
        public ?int $priority = null, // Priority level
        public ?array $tags = null, // Activity tags this membership level gives access to
        public ?object $custom = null, // Custom data for the membership level
        public ?\DateTime $createdAt = null, // When the membership level was created
        public ?\DateTime $updatedAt = null, // When the membership level was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
