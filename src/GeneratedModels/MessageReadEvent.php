<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel or thread is marked as read.
 */
class MessageReadEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "message.read" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the message was read
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel where the message was read
        public ?string $channelID = null, // The ID of the channel where the message was read
        public ?UserResponseCommonFields $user = null,
        public ?ChannelResponse $channel = null,
        public ?ThreadResponse $thread = null,
        public ?string $lastReadMessageID = null, // The ID of the last read message
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
