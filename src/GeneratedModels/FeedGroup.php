<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedGroup extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $groupID = null,
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?string $defaultVisibility = null,
        public ?object $custom = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?StoriesConfig $stories = null,
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null,
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null,
        public ?RankingConfig $ranking = null,
        public ?AggregationConfig $aggregation = null,
        public ?int $aggregationVersion = null,
        public ?\DateTime $lastFeedGetAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
