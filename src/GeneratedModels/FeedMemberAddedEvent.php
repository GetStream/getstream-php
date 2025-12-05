<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed member is added.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property FeedMemberResponse $member
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property UserResponseCommonFields|null $user
 */
class FeedMemberAddedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?object $custom = null,
        public ?FeedMemberResponse $member = null,
        public ?string $type = null, // The type of event: "feeds.feed_member.added" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
