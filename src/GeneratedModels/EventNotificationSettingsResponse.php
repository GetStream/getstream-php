<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class EventNotificationSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?APNSPayload $apns = null,
        public ?FCMPayload $fcm = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
