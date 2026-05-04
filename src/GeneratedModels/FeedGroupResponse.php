<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedGroupResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Identifier within the group
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?string $defaultVisibility = null, // Default visibility for activities. One of: public, visible, followers, members, private
        public ?object $custom = null, // Custom data for the feed group
        public ?\DateTime $createdAt = null, // When the feed group was created
        public ?\DateTime $updatedAt = null, // When the feed group was last updated
        public ?\DateTime $deletedAt = null,
        public ?StoriesConfig $stories = null,
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfigResponse>|null */
        #[ArrayOf(ActivitySelectorConfigResponse::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
        public ?RankingConfig $ranking = null,
        public ?AggregationConfig $aggregation = null,
        public ?ActivityFilterConfig $activityFilter = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
