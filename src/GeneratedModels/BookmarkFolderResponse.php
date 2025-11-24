<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BookmarkFolderResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // When the folder was created 
        public ?string $id = null,    // Unique identifier for the folder 
        public ?string $name = null,    // Name of the folder 
        public ?\DateTime $updatedAt = null,    // When the folder was last updated 
        public ?UserResponseCommonFields $user = null,
        public ?object $custom = null,    // Custom data for the folder 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
