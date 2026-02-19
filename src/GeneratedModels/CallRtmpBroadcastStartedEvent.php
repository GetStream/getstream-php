<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when RTMP broadcast has started
 */
class CallRtmpBroadcastStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.rtmp_broadcast_started" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $callCid = null, // The unique identifier for a call (<type>:<id>)
        public ?string $name = null, // Name of the given RTMP broadcast
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
