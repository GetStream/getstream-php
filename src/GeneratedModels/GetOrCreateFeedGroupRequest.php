<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?AggregationConfig $aggregation = null,
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
        public ?object $custom = null, // Custom data for the feed group
        public ?string $defaultVisibility = null, // Default visibility for the feed group, can be 'public', 'visible', 'followers', 'members', or 'private'. Defaults to 'visible' if not provided. 
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
