<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationMarkUnreadEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $firstUnreadMessageID = null,
        public ?\DateTime $lastReadAt = null,
        public ?int $totalUnreadCount = null,
        public ?int $unreadChannels = null,
        public ?int $unreadCount = null,
        public ?int $unreadMessages = null,
        public ?int $unreadThreads = null,
        public ?string $type = null,
        public ?string $lastReadMessageID = null,
        public ?string $team = null,
        public ?string $threadID = null,
        public ?ChannelResponse $channel = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
