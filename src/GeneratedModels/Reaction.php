<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class Reaction extends BaseModel
{
    public function __construct(
        public ?string $activityID = null,
        public ?\DateTime $createdAt = null,
        public ?string $kind = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?\DateTime $deletedAt = null,
        public ?string $id = null,
        public ?string $parent = null,
        public ?int $score = null,
        public ?array $targetFeeds = null,
        public ?object $childrenCounts = null,
        public ?object $data = null,
        public ?array $latestChildren = null,
        public ?object $moderation = null,
        public ?array $ownChildren = null,
        public ?object $targetFeedsExtraData = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
