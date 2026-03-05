<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a message is unblocked.
 */
class MessageUnblockedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "message.unblocked" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the message was unblocked
        public ?string $messageID = null,
        public ?MessageResponse $message = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
