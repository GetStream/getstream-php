<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a reminder becomes due, triggering a notification for the user.
 */
class ReminderNotificationEvent extends BaseModel
{
    public function __construct(
        public ?string $cid = null,    // The CID of the Channel for which the reminder was created 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $messageID = null,    // The ID of the message for which the reminder was created 
        public ?string $userID = null,    // The ID of the user for whom the reminder was created 
        public ?object $custom = null,
        public ?string $type = null,    // The type of event: "notification.reminder_due" in this case 
        public ?string $parentID = null,
        public ?\DateTime $receivedAt = null,
        public ?ReminderResponseData $reminder = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
