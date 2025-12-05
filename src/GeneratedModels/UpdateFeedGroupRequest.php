<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $defaultVisibility
 * @property array<ActivityProcessorConfig>|null $activityProcessors
 * @property array<ActivitySelectorConfig>|null $activitySelectors
 * @property AggregationConfig|null $aggregation
 * @property object|null $custom
 * @property NotificationConfig|null $notification
 * @property PushNotificationConfig|null $pushNotification
 * @property RankingConfig|null $ranking
 * @property StoriesConfig|null $stories
 */
class UpdateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?string $defaultVisibility = null,
        /** @var array<ActivityProcessorConfig>|null Configuration for activity processors */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfig>|null Configuration for activity selectors */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
        public ?AggregationConfig $aggregation = null,
        public ?object $custom = null, // Custom data for the feed group
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
