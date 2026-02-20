<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a user bookmarks an activity.
 */
class BookmarkAddedEvent extends BaseModel
{
    public function __construct(
        public ?BookmarkResponse $bookmark = null,
        public ?string $type = null, // The type of event: "feeds.bookmark.added" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
