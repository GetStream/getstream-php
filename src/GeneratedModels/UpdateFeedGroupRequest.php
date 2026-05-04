<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?StoriesConfig $stories = null,
        public ?object $custom = null, // Custom data for the feed group
        public ?string $defaultVisibility = null,
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
        public ?RankingConfig $ranking = null,
        public ?AggregationConfig $aggregation = null,
        public ?ActivityFilterConfig $activityFilter = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
