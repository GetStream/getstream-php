<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a bookmark folder is deleted.
 *
 * @property \DateTime $createdAt
 * @property BookmarkFolderResponse $bookmarkFolder
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 * @property UserResponseCommonFields|null $user
 */
class BookmarkFolderDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?BookmarkFolderResponse $bookmarkFolder = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.bookmark_folder.deleted" in this case
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
