<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed unfollows another feed.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property FollowResponse $follow
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 */
class FollowDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?object $custom = null,
        public ?FollowResponse $follow = null,
        public ?string $type = null, // The type of event: "feeds.follow.deleted" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
