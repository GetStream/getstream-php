<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class FeedGroup extends BaseModel
{
    public function __construct(
        public ?int $aggregationVersion = null,
        public ?int $appPk = null,
        public ?\DateTime $createdAt = null,
        public ?string $defaultVisibility = null,
        public ?string $groupID = null,
        public ?\DateTime $updatedAt = null,
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null,
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $lastFeedGetAt = null,
        public ?AggregationConfig $aggregation = null,
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
