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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
