<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpsertPushTemplateRequest extends BaseModel
{
    public function __construct(
        public ?string $eventType = null, // Event type. One of: message.new, message.updated, reaction.new, notification.reminder_due, feeds.activity.added, feeds.comment.added, feeds.activity.reaction.added, feeds.comment.reaction.added, feeds.follow.created, feeds.notification_feed.updated
        public ?string $pushProviderType = null, // Push provider type. One of: firebase, apn, huawei, xiaomi
        public ?bool $enablePush = null, // Whether to send push notification for this event
        public ?string $pushProviderName = null, // Push provider name
        public ?string $template = null, // Push template
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
