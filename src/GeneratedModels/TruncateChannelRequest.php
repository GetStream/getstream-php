<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TruncateChannelRequest extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null,    // Permanently delete channel data (messages, reactions, etc.) 
        public ?bool $skipPush = null,    // When `message` is set disables all push notifications for it 
        public ?\DateTime $truncatedAt = null,    // Truncate channel data up to `truncated_at`. The system message (if provided) creation time is always greater than `truncated_at` 
        public ?string $userID = null,
        public ?array $memberIds = null,    // List of member IDs to hide message history for. If empty, truncates the channel for all members 
        public ?MessageRequest $message = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
