<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully unfrozen.
 */
class ChannelUnFrozenEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "channel.unfrozen" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel which was unfrozen
        public ?string $channelType = null, // The type of the channel which was unfrozen
        public ?string $channelID = null, // The ID of the channel which was unfrozen
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
