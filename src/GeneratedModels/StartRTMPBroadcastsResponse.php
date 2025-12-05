<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * StartRTMPBroadcastsResponse is the payload for starting an RTMP broadcast.
 *
 * @property string $duration
 */
class StartRTMPBroadcastsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
