<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteChannelResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $channelMutes = null,    // Object with mutes (if multiple channels were muted) 
        public ?ChannelMute $channelMute = null,
        public ?OwnUser $ownUser = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
