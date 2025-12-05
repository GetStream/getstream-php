<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelCid
 * @property \DateTime $createdAt
 * @property string $messageID
 * @property string $taskID
 * @property \DateTime $updatedAt
 * @property string $userID
 * @property \DateTime|null $remindAt
 * @property Channel|null $channel
 * @property Message|null $message
 * @property User|null $user
 */
class MessageReminder extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?string $taskID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?\DateTime $remindAt = null,
        public ?Channel $channel = null,
        public ?Message $message = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
