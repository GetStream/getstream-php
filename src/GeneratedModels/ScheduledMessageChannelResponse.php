<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The channel of a scheduled message
 */
class ScheduledMessageChannelResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null, // Channel CID (<type>:<id>)
        public ?string $type = null, // Channel type
        public ?string $id = null, // Channel ID
        public ?string $name = null, // Channel name, from its custom data
        public ?string $image = null, // Channel image, from its custom data
        public ?int $memberCount = null, // Number of members of the channel. 0 when the channel is deleted
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // Up to 4 members of the channel, oldest first. Empty when the channel is deleted
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
