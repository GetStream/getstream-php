<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AggregatedActivityResponse extends BaseModel
{
    public function __construct(
        public ?int $activityCount = null,    // Number of activities in this aggregation 
        public ?\DateTime $createdAt = null,    // When the aggregation was created 
        public ?string $group = null,    // Grouping identifier 
        public ?int $score = null,    // Ranking score for this aggregation 
        public ?\DateTime $updatedAt = null,    // When the aggregation was last updated 
        public ?int $userCount = null,    // Number of unique users in this aggregation 
        public ?array $activities = null,    // List of activities in this aggregation 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
