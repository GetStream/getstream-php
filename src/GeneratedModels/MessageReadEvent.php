<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel or thread is marked as read.
 */
class MessageReadEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "message.read" in this case
        public ?string $channelID = null, // The ID of the channel where the message was read
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?string $channelType = null, // The type of the channel where the message was read
        public ?string $cid = null, // The CID of the channel where the message was read
        public ?string $lastReadMessageID = null, // The ID of the last read message
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?ChannelResponse $channel = null,
        public ?object $channelCustom = null,
        public ?ThreadResponse $thread = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
