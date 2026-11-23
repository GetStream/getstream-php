<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MarkUnreadRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // ID of the message from where the channel is marked unread. Omit message_id, message_timestamp and thread_id to mark the whole channel soft unread: a dot without a counter
        public ?string $threadID = null, // Mark a thread unread. Specify at most one of thread_id, message_timestamp, or message_id; omit all three to mark the channel soft unread
        public ?\DateTime $messageTimestamp = null, // Timestamp of the message from where the channel is marked unread. Omit message_id, message_timestamp and thread_id to mark the whole channel soft unread
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
