<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FollowRequest extends BaseModel
{
    public function __construct(
        public ?string $source = null, // Fully qualified ID of the source feed
        public ?string $target = null, // Fully qualified ID of the target feed
        public ?object $custom = null, // Custom data for the follow relationship
        public ?string $pushPreference = null, // Push preference for the follow relationship
        public ?bool $createNotificationActivity = null, // Whether to create a notification activity for this follow
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when create_notification_activity is true)
        public ?bool $skipPush = null, // Whether to skip push for this follow
        public ?string $status = null, // Status of the follow relationship. One of: accepted, pending, rejected
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
