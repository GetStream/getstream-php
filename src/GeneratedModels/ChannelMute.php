<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelMute extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?ChannelResponse $channel = null,
        public ?\DateTime $expires = null, // Date/time of mute expiration
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
