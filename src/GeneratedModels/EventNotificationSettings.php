<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EventNotificationSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?APNS $apns = null,
        public ?FCM $fcm = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
