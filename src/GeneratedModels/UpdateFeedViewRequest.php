<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateFeedViewRequest extends BaseModel
{
    public function __construct(
        public ?array $activitySelectors = null,    // Updated configuration for selecting activities 
        public ?AggregationConfig $aggregation = null,
        public ?RankingConfig $ranking = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
