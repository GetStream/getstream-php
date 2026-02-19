<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedViewRequest extends BaseModel
{
    public function __construct(
        public ?AggregationConfig $aggregation = null,
        public ?RankingConfig $ranking = null,
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Configuration for selecting activities
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
