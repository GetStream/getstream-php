<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Pending message event for async moderation
 */
class PendingMessageEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $method = null,    // The method used for the pending message 
        public ?object $custom = null,
        public ?string $type = null,    // The type of event: "message.pending" in this case 
        public ?\DateTime $receivedAt = null,
        public ?Channel $channel = null,
        public ?Message $message = null,
        public ?array $metadata = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
