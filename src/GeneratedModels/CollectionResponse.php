<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CollectionResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name/type of the collection
        public ?string $id = null, // Unique identifier for the collection within its name
        public ?object $custom = null, // Custom data for the collection
        public ?string $userID = null, // ID of the user who owns this collection
        public ?\DateTime $createdAt = null, // When the collection was created
        public ?\DateTime $updatedAt = null, // When the collection was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
