<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Pending message event for async moderation
 */
class PendingMessageEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "message.pending" in this case
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponse $user = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?array $metadata = null, // Metadata attached to the pending message
        public ?string $method = null, // The method used for the pending message
        public ?\DateTime $createdAt = null, // Date/time of creation
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
