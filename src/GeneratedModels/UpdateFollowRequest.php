<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateFollowRequest extends BaseModel
{
    public function __construct(
        public ?string $source = null, // Fully qualified ID of the source feed
        public ?string $target = null, // Fully qualified ID of the target feed
        public ?object $custom = null, // Custom data for the follow relationship
        public ?string $pushPreference = null, // Push preference for the follow relationship
        public ?bool $createNotificationActivity = null, // Whether to create a notification activity for this follow
        /** @deprecated */
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when create_notification_activity is true) Deprecated: use notification_context.trigger.custom and notification_context.target.custom instead
        public ?bool $skipPush = null, // Whether to skip push for this follow
        public ?string $status = null, // Status of the follow relationship. One of: accepted, pending, rejected
        public ?int $activityCopyLimit = null, // Maximum number of historical activities to copy from the target feed when the follow is first materialized. Not set = unlimited (default). 0 = copy nothing. Range: 0-1000.
        public ?bool $enrichOwnFields = null, // If true, enriches the follow's source_feed and target_feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
        public ?string $followerRole = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
