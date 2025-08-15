<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EnrichedReaction extends BaseModel
{
    public function __construct(
        public ?string $activityID = null,
        public ?string $kind = null,
        public ?string $userID = null,
        public ?string $id = null,
        public ?string $parent = null,
        public ?array $targetFeeds = null,
        public ?array $childrenCounts = null,
        public ?Time $createdAt = null,
        public ?object $data = null,
        public ?array $latestChildren = null,
        public ?array $ownChildren = null,
        public ?Time $updatedAt = null,
        public ?Data $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
