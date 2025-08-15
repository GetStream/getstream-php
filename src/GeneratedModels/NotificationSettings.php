<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?EventNotificationSettings $callLiveStarted = null,
        public ?EventNotificationSettings $callMissed = null,
        public ?EventNotificationSettings $callNotification = null,
        public ?EventNotificationSettings $callRing = null,
        public ?EventNotificationSettings $sessionStarted = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
