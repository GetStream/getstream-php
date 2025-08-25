<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?array $activityProcessors = null,    // Configuration for activity processors (max 10) 
        public ?array $activitySelectors = null,    // Configuration for activity selectors (max 10) 
        public ?AggregationConfig $aggregation = null,
        public ?object $custom = null,    // Custom data for the feed group 
        public ?NotificationConfig $notification = null,
        public ?PushNotificationConfig $pushNotification = null,
        public ?RankingConfig $ranking = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
