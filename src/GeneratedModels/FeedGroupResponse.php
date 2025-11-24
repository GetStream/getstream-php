<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedGroupResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // When the feed group was created 
        public ?string $id = null,    // Identifier within the group 
        public ?\DateTime $updatedAt = null,    // When the feed group was last updated 
        public ?string $defaultVisibility = null,    // Default visibility for activities 
        public ?\DateTime $deletedAt = null,
        public ?array $activityProcessors = null,    // Configuration for activity processors 
        public ?array $activitySelectors = null,    // Configuration for activity selectors 
        public ?AggregationConfig $aggregation = null,
        public ?object $custom = null,    // Custom data for the feed group 
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
