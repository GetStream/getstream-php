<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a call RTMP broadcast has failed
 */
class CallRtmpBroadcastFailedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,    // The unique identifier for a call (<type>:<id>) 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $name = null,    // Name of the given RTMP broadcast 
        public ?string $type = null,    // The type of event: "call.rtmp_broadcast_failed" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
