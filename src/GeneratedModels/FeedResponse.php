<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $activityCount
 * @property \DateTime $createdAt
 * @property string $description
 * @property string $feed
 * @property int $followerCount
 * @property int $followingCount
 * @property string $groupID
 * @property string $id
 * @property int $memberCount
 * @property string $name
 * @property int $pinCount
 * @property \DateTime $updatedAt
 * @property UserResponse $createdBy
 * @property \DateTime|null $deletedAt
 * @property string|null $visibility
 * @property array|null $filterTags
 * @property array<FeedOwnCapability>|null $ownCapabilities
 * @property array<FollowResponse>|null $ownFollows
 * @property object|null $custom
 * @property FeedMemberResponse|null $ownMembership
 */
class FeedResponse extends BaseModel
{
    public function __construct(
        public ?int $activityCount = null,
        public ?\DateTime $createdAt = null, // When the feed was created
        public ?string $description = null, // Description of the feed
        public ?string $feed = null, // Fully qualified feed ID (group_id:id)
        public ?int $followerCount = null, // Number of followers of this feed
        public ?int $followingCount = null, // Number of feeds this feed follows
        public ?string $groupID = null, // Group this feed belongs to
        public ?string $id = null, // Unique identifier for the feed
        public ?int $memberCount = null, // Number of members in this feed
        public ?string $name = null, // Name of the feed
        public ?int $pinCount = null, // Number of pinned activities in this feed
        public ?\DateTime $updatedAt = null, // When the feed was last updated
        public ?UserResponse $createdBy = null,
        public ?\DateTime $deletedAt = null, // When the feed was deleted
        public ?string $visibility = null, // Visibility setting for the feed
        public ?array $filterTags = null, // Tags used for filtering feeds
        /** @var array<FeedOwnCapability>|null Capabilities the current user has for this feed */
        #[ArrayOf(FeedOwnCapability::class)]
        public ?array $ownCapabilities = null, // Capabilities the current user has for this feed
        /** @var array<FollowResponse>|null Follow relationships where the current user's feeds are following this feed */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollows = null, // Follow relationships where the current user's feeds are following this feed
        public ?object $custom = null, // Custom data for the feed
        public ?FeedMemberResponse $ownMembership = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
