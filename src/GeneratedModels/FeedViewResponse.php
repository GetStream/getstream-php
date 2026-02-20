<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedViewResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the custom feed view
        /** @var array<ActivitySelectorConfigResponse>|null */
        #[ArrayOf(ActivitySelectorConfigResponse::class)]
        public ?array $activitySelectors = null, // Configured activity selectors
        public ?RankingConfig $ranking = null,
        public ?AggregationConfig $aggregation = null,
        public ?\DateTime $lastUsedAt = null, // When the feed view was last used
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
