<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class NotificationSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?EventNotificationSettingsResponse $callLiveStarted = null,
        public ?EventNotificationSettingsResponse $callMissed = null,
        public ?EventNotificationSettingsResponse $callNotification = null,
        public ?EventNotificationSettingsResponse $callRing = null,
        public ?EventNotificationSettingsResponse $sessionStarted = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
