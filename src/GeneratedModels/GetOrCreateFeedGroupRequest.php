<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?StoriesConfig $stories = null,
        public ?object $custom = null, // Custom data for the feed group
        public ?string $defaultVisibility = null, // Default visibility for the feed group, can be 'public', 'visible', 'followers', 'members', or 'private'. Defaults to 'visible' if not provided. 
        public ?string $defaultFollowerRole = null, // Role new followers of feeds in this group are given. Either a built-in (feed_follower, feed_member_viewer) or any role your app has defined. Empty means feed_follower. Applied when the follow is accepted, so a follow that starts pending picks it up on approval
        /** @var array<ActivityProcessorConfig>|null */
        #[ArrayOf(ActivityProcessorConfig::class)]
        public ?array $activityProcessors = null, // Configuration for activity processors
        /** @var array<ActivitySelectorConfig>|null */
        #[ArrayOf(ActivitySelectorConfig::class)]
        public ?array $activitySelectors = null, // Configuration for activity selectors
        public ?RankingConfig $ranking = null,
        public ?AggregationConfig $aggregation = null,
        public ?ActivityFilterConfig $activityFilter = null,
        public ?ActivityProcessingConfig $activityProcessing = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
