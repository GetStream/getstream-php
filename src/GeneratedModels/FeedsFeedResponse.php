<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsFeedResponse extends BaseModel
{
    public function __construct(
        public ?string $groupID = null,
        public ?string $id = null,
        public ?string $feed = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?object $custom = null,
        public ?FeedsActivityLocation $location = null,
        public ?array $filterTags = null,
        public ?string $visibility = null,
        public ?UserResponse $createdBy = null,
        public ?int $memberCount = null,
        public ?int $followerCount = null,
        public ?int $followingCount = null,
        public ?int $activityCount = null,
        public ?int $pinCount = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
