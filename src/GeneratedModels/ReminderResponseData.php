<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReminderResponseData extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?UserResponse $user = null,
        public ?\DateTime $remindAt = null,
        public ?string $channelCid = null,
        public ?string $messageID = null,
        public ?string $userID = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
