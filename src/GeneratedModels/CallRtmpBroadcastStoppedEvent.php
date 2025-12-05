<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when RTMP broadcast has stopped
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $name
 * @property string $type
 */
class CallRtmpBroadcastStoppedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null, // The unique identifier for a call (<type>:<id>)
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $name = null, // Name of the given RTMP broadcast
        public ?string $type = null, // The type of event: "call.rtmp_broadcast_stopped" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
