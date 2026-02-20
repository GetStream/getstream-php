<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BookmarkFolderResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the folder
        public ?UserResponse $user = null,
        public ?string $name = null, // Name of the folder
        public ?object $custom = null, // Custom data for the folder
        public ?\DateTime $createdAt = null, // When the folder was created
        public ?\DateTime $updatedAt = null, // When the folder was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
