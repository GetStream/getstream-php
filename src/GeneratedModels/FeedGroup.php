<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedGroup extends BaseModel
{
    public function __construct(
        public ?int $aggregationVersion = null,
        public ?int $appPK = null,
        public ?\DateTime $createdAt = null,
        public ?string $defaultVisibility = null,
        public ?string $iD = null,
        public ?\DateTime $updatedAt = null,
        public ?array $activityProcessors = null,
        public ?array $activitySelectors = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $lastFeedGetAt = null,
        public ?AggregationConfig $aggregation = null,
        public ?NotificationConfig $notification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
