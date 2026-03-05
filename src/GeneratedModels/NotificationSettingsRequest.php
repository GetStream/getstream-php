<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NotificationSettingsRequest extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?EventNotificationSettingsRequest $callLiveStarted = null,
        public ?EventNotificationSettingsRequest $sessionStarted = null,
        public ?EventNotificationSettingsRequest $callNotification = null,
        public ?EventNotificationSettingsRequest $callRing = null,
        public ?EventNotificationSettingsRequest $callMissed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
