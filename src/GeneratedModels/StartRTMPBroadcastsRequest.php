<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * StartRTMPBroadcastsRequest is the payload for starting RTMP broadcasts.
 */
class StartRTMPBroadcastsRequest extends BaseModel
{
    public function __construct(
        public ?array $broadcasts = null,    // List of broadcasts to start 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
