<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property \DateTime $updatedAt
 * @property ActivityResponse $activity
 * @property UserResponse $user
 * @property object|null $custom
 * @property BookmarkFolderResponse|null $folder
 */
class BookmarkResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // When the bookmark was created
        public ?\DateTime $updatedAt = null, // When the bookmark was last updated
        public ?ActivityResponse $activity = null,
        public ?UserResponse $user = null,
        public ?object $custom = null, // Custom data for the bookmark
        public ?BookmarkFolderResponse $folder = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
