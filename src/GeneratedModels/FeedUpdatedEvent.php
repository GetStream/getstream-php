<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed is updated.
 */
class FeedUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?FeedResponse $feed = null,
        public ?string $type = null, // The type of event: "feeds.feed.updated" in this case
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $fid = null,
        public ?string $feedVisibility = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
