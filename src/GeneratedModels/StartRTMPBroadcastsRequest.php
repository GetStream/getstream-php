<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * StartRTMPBroadcastsRequest is the payload for starting RTMP broadcasts.
 *
 * @property array<RTMPBroadcastRequest> $broadcasts
 */
class StartRTMPBroadcastsRequest extends BaseModel
{
    public function __construct(
        /** @var array<RTMPBroadcastRequest>|null List of broadcasts to start */
        #[ArrayOf(RTMPBroadcastRequest::class)]
        public ?array $broadcasts = null, // List of broadcasts to start
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
