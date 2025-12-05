<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $enablePush
 * @property array|null $pushTypes
 */
class PushNotificationConfig extends BaseModel
{
    public function __construct(
        public ?bool $enablePush = null, // Whether push notifications are enabled for this feed group
        public ?array $pushTypes = null, // List of notification types that should trigger push notifications (e.g., follow, comment, reaction, comment_reaction, mention)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
