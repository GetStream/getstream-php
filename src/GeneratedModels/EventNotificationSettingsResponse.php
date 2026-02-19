<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EventNotificationSettingsResponse extends BaseModel
{
    public function __construct(
        public ?APNSPayload $apns = null,
        public ?FCMPayload $fcm = null,
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
