<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a feed is created.
 */
class FeedCreatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $fid = null,
        public ?array $members = null,
        public ?object $custom = null,
        public ?FeedResponse $feed = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null,    // The type of event: "feeds.feed.created" in this case 
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
