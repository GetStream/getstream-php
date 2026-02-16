<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel/thread is marked as unread.
 */
class NotificationMarkUnreadEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "notification.mark_unread" in this case
        public ?string $channelID = null, // The ID of the channel which was marked as unread
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?string $channelType = null, // The type of the channel which was marked as unread
        public ?string $cid = null, // The CID of the channel which was marked as unread
        public ?string $firstUnreadMessageID = null, // The ID of the first unread message
        public ?\DateTime $lastReadAt = null, // The time when the channel/thread was marked as unread
        public ?string $lastReadMessageID = null, // The ID of the last read message
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?string $threadID = null, // The ID of the thread which was marked as unread
        public ?int $totalUnreadCount = null, // The total number of unread messages
        public ?int $unreadChannels = null, // The number of channels with unread messages
        public ?int $unreadCount = null, // The total number of unread messages
        public ?int $unreadMessages = null, // The number of unread messages in the channel/thread after first_unread_message_id
        public ?int $unreadThreadMessages = null, // The total number of unread messages in the threads
        public ?int $unreadThreads = null, // The number of unread threads
        public ?ChannelResponse $channel = null,
        public ?object $channelCustom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
