<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a feed is created.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property array<FeedMemberResponse> $members
 * @property object $custom
 * @property FeedResponse $feed
 * @property UserResponseCommonFields $user
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 */
class FeedCreatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        /** @var array<FeedMemberResponse>|null */
        #[ArrayOf(FeedMemberResponse::class)]
        public ?array $members = null,
        public ?object $custom = null,
        public ?FeedResponse $feed = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "feeds.feed.created" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
