<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully deleted.
 */
class ChannelDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "channel.deleted" in this case
        public ?string $channelID = null, // The ID of the channel which was deleted
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?string $channelType = null, // The type of the channel which was deleted
        public ?string $cid = null, // The CID of the channel which was deleted
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?object $channelCustom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
