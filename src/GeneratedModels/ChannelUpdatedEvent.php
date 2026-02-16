<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully updated.
 */
class ChannelUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "channel.updated" in this case
        public ?string $channelID = null, // The ID of the channel which was updated
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?string $channelType = null, // The type of the channel which was updated
        public ?string $cid = null, // The CID of the channel which was updated
        public ?string $messageID = null,
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?object $channelCustom = null,
        public ?MessageResponse $message = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
