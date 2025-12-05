<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed member is removed.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property string $memberID
 * @property object $custom
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property UserResponseCommonFields|null $user
 */
class FeedMemberRemovedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?string $memberID = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.feed_member.removed" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
