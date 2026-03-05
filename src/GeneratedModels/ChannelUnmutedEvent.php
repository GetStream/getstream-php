<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully unmuted.
 */
class ChannelUnmutedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "channel.unmuted" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?ChannelMute $mute = null,
        /** @var array<ChannelMute>|null */
        #[ArrayOf(ChannelMute::class)]
        public ?array $mutes = null, // The mute objects
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
