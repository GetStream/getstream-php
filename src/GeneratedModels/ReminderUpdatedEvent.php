<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a reminder is updated.
 *
 * @property string $cid
 * @property \DateTime $createdAt
 * @property string $messageID
 * @property string $userID
 * @property object $custom
 * @property string $type
 * @property string|null $parentID
 * @property \DateTime|null $receivedAt
 * @property ReminderResponseData|null $reminder
 */
class ReminderUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?string $cid = null, // The CID of the Channel for which the reminder was created
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null, // The ID of the message for which the reminder was created
        public ?string $userID = null, // The ID of the user for whom the reminder was created
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "reminder.updated" in this case
        public ?string $parentID = null, // The ID of the parent message, if the reminder is for a thread message
        public ?\DateTime $receivedAt = null,
        public ?ReminderResponseData $reminder = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
