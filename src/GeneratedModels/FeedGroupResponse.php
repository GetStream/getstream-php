<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedGroupResponse extends BaseModel
{
    public function __construct(
        public ?AggregationConfig $aggregation = null,
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
        public ?string $id = null, // Identifier within the group
        public ?string $defaultVisibility = null, // Default visibility for activities. One of: public, visible, followers, members, private
        public ?object $custom = null, // Custom data for the feed group
        public ?\DateTime $createdAt = null, // When the feed group was created
        public ?\DateTime $updatedAt = null, // When the feed group was last updated
        public ?\DateTime $deletedAt = null,
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfigResponse>|null */
        #[ArrayOf(ActivitySelectorConfigResponse::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
