<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property APNS $apns
 * @property FCM $fcm
 */
class EventNotificationSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?APNS $apns = null,
        public ?FCM $fcm = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
