<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MuteChannelResponse extends BaseModel
{
    public function __construct(
        public ?ChannelMute $channelMute = null,
        /** @var array<ChannelMute>|null */
        #[ArrayOf(ChannelMute::class)]
        public ?array $channelMutes = null, // Object with mutes (if multiple channels were muted)
        public ?OwnUserResponse $ownUser = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
