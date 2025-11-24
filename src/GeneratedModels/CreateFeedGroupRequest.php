<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Unique identifier for the feed group 
        public ?string $defaultVisibility = null,    // Default visibility for the feed group, can be 'public', 'visible', 'followers', 'members', or 'private'. Defaults to 'visible' if not provided.  
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
