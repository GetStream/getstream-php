<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed group is deleted.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property string $groupID
 * @property object $custom
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 */
class FeedGroupDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?string $groupID = null, // The ID of the feed group that was deleted
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.feed_group.deleted" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
