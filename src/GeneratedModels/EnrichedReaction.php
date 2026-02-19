<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EnrichedReaction extends BaseModel
{
    public function __construct(
        public ?Time $createdAt = null,
        public ?Time $updatedAt = null,
        public ?Data $user = null,
        public ?string $id = null,
        public ?string $kind = null,
        public ?string $activityID = null,
        public ?string $userID = null,
        public ?object $data = null,
        public ?array $targetFeeds = null,
        public ?string $parent = null,
        public ?array $latestChildren = null,
        public ?array $ownChildren = null,
        public ?array $childrenCounts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
