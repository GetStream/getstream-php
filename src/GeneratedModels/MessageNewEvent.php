<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a message was successfully sent or when a message became visible after command execution.
 */
class MessageNewEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null,
        public ?int $watcherCount = null, // The number of watchers
        public ?object $custom = null,
        public ?MessageResponse $message = null,
        public ?string $type = null, // The type of event: "message.new" in this case
        public ?string $channelID = null, // The ID of the channel where the message was sent
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?string $channelType = null, // The type of the channel where the message was sent
        public ?string $cid = null, // The CID of the channel where the message was sent
        public ?string $parentAuthor = null, // The author of the parent message
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?int $totalUnreadCount = null,
        public ?int $unreadChannels = null,
        public ?int $unreadCount = null, // The number of unread messages
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $threadParticipants = null, // The participants of the thread
        public ?ChannelResponse $channel = null,
        public ?object $channelCustom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
