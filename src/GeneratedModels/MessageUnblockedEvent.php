<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a message is unblocked.
 */
class MessageUnblockedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null,
        public ?object $custom = null,
        public ?MessageResponse $message = null,
        public ?string $type = null, // The type of event: "message.unblocked" in this case
        public ?string $cid = null, // The CID of the channel where the message was unblocked
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
