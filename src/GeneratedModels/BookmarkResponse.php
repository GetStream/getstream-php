<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BookmarkResponse extends BaseModel
{
    public function __construct(
        public ?string $objectType = null, // Type of the bookmarked object (activity or comment)
        public ?string $objectID = null, // ID of the bookmarked object
        public ?UserResponse $user = null,
        public ?ActivityResponse $activity = null,
        public ?CommentResponse $comment = null,
        public ?BookmarkFolderResponse $folder = null,
        public ?object $custom = null, // Custom data for the bookmark
        public ?\DateTime $createdAt = null, // When the bookmark was created
        public ?\DateTime $updatedAt = null, // When the bookmark was last updated
        public ?string $activityID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
