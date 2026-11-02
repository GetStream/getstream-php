<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when an agent channel is rewound to an earlier message. Clients should reload the channel's messages.
 */
class ChannelRewoundEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "channel.rewound" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel which was rewound
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel which was rewound
        public ?string $channelID = null, // The ID of the channel which was rewound
        public ?ChannelResponse $channel = null, // Represents channel in chat
        public ?UserResponseCommonFields $user = null,
        public ?ChannelRewindResponse $rewind = null, // A rewind of an agent channel
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
