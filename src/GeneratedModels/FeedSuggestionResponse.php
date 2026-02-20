<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedSuggestionResponse extends BaseModel
{
    public function __construct(
        public ?string $groupID = null, // Group this feed belongs to
        public ?string $id = null, // Unique identifier for the feed
        public ?string $feed = null, // Fully qualified feed ID (group_id:id)
        public ?string $name = null, // Name of the feed
        public ?string $description = null, // Description of the feed
        public ?object $custom = null, // Custom data for the feed
        public ?array $filterTags = null, // Tags used for filtering feeds
        public ?string $visibility = null, // Visibility setting for the feed
        public ?UserResponse $createdBy = null,
        public ?int $memberCount = null, // Number of members in this feed
        public ?int $followerCount = null, // Number of followers of this feed
        public ?int $followingCount = null, // Number of feeds this feed follows
        public ?int $activityCount = null,
        public ?int $pinCount = null, // Number of pinned activities in this feed
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollows = null, // Follow relationships where the current user's feeds are following this feed
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollowings = null, // Follow relationships where the feed owner’s feeds are following the current user's feeds
        /** @var array<FeedOwnCapability>|null */
        #[ArrayOf(FeedOwnCapability::class)]
        public ?array $ownCapabilities = null, // Capabilities the current user has for this feed
        public ?FeedMemberResponse $ownMembership = null,
        public ?\DateTime $createdAt = null, // When the feed was created
        public ?\DateTime $updatedAt = null, // When the feed was last updated
        public ?\DateTime $deletedAt = null, // When the feed was deleted
        public ?int $recommendationScore = null,
        public ?string $reason = null,
        public ?array $algorithmScores = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
