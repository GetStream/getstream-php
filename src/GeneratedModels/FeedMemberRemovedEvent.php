<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed member is removed.
 */
class FeedMemberRemovedEvent extends BaseModel
{
    public function __construct(
        public ?string $memberID = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "feeds.feed_member.removed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $fid = null,
        public ?string $feedVisibility = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
