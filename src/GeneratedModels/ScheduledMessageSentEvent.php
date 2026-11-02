<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a scheduled message is sent.
 */
class ScheduledMessageSentEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "scheduled_message.sent" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel the message was sent to
        public ?UserResponseCommonFields $user = null,
        public ?ScheduledMessageResponse $scheduledMessage = null, // A message scheduled to be sent later
        public ?string $messageID = null, // The ID of the message that was sent
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
