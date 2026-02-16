<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a channel is successfully unfrozen.
 */
class ChannelUnFrozenEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "channel.unfrozen" in this case
        public ?string $channelID = null, // The ID of the channel which was unfrozen
        public ?string $channelType = null, // The type of the channel which was unfrozen
        public ?string $cid = null, // The CID of the channel which was unfrozen
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
