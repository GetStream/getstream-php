<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedViewResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Unique identifier for the custom feed view 
        public ?\DateTime $lastUsedAt = null,    // When the feed view was last used 
        public ?array $activityProcessors = null,    // Configured activity processors 
        public ?array $activitySelectors = null,    // Configured activity selectors 
        public ?AggregationConfig $aggregation = null,
        public ?RankingConfig $ranking = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
