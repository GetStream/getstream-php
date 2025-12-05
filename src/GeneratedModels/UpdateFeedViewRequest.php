<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<ActivitySelectorConfig>|null $activitySelectors
 * @property AggregationConfig|null $aggregation
 * @property RankingConfig|null $ranking
 */
class UpdateFeedViewRequest extends BaseModel
{
    public function __construct(
        /** @var array<ActivitySelectorConfig>|null Updated configuration for selecting activities */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Updated configuration for selecting activities
        public ?AggregationConfig $aggregation = null,
        public ?RankingConfig $ranking = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
