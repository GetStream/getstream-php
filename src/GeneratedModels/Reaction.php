<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Reaction extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $kind = null,
        public ?string $activityID = null,
        public ?string $userID = null,
        public ?object $data = null,
        public ?array $targetFeeds = null,
        public ?object $targetFeedsExtraData = null,
        public ?string $parent = null,
        public ?User $user = null,
        public ?array $latestChildren = null,
        public ?array $ownChildren = null,
        public ?object $childrenCounts = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?float $score = null,
        public ?object $moderation = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
