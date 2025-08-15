<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreateFeedViewRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Unique identifier for the feed view 
        public ?array $activityProcessors = null,    // Configured activity Processors 
        public ?array $activitySelectors = null,    // Configuration for selecting activities 
        public ?AggregationConfig $aggregation = null,
        public ?RankingConfig $ranking = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
