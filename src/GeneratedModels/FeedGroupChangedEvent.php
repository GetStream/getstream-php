<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed group is changed.
 */
class FeedGroupChangedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "feeds.feed_group.changed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $fid = null,
        public ?string $feedVisibility = null,
        public ?UserResponseCommonFields $user = null,
        public ?FeedGroup $feedGroup = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
