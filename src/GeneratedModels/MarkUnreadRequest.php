<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkUnreadRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null,    // ID of the message from where the channel is marked unread 
        public ?\DateTime $messageTimestamp = null,    // Timestamp of the message from where the channel is marked unread 
        public ?string $threadID = null,    // Mark a thread unread, specify one of the thread, message timestamp, or message id 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
