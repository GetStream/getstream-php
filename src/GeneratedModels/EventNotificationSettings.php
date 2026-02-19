<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EventNotificationSettings extends BaseModel
{
    public function __construct(
        public ?APNS $apns = null,
        public ?FCM $fcm = null,
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
