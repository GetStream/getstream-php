<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PushNotificationConfig extends BaseModel
{
    public function __construct(
        public ?bool $enablePush = null, // Whether push notifications are enabled for this feed group
        public ?array $pushTypes = null, // Allowlist of notification types that may trigger push (e.g. follow, comment, reaction, comment_reaction, mention, or any custom activity.type). Empty or omitted means no types. Built-in notifications match notification_context.trigger.type; manually added notification activities match activity.type.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
