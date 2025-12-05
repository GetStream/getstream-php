<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed group is changed.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property FeedGroup|null $feedGroup
 * @property UserResponseCommonFields|null $user
 */
class FeedGroupChangedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.feed_group.changed" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?FeedGroup $feedGroup = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
