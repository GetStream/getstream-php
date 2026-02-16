<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully hidden.
 */
class ChannelHiddenEvent extends BaseModel
{
    public function __construct(
        public ?bool $clearHistory = null, // Whether the history was cleared
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "channel.hidden" in this case
        public ?string $channelID = null, // The ID of the channel which was hidden
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?string $channelType = null, // The type of the channel which was hidden
        public ?string $cid = null, // The CID of the channel which was hidden
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?object $channelCustom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
