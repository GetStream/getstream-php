<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when HLS broadcasting has started
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $hlsPlaylistUrl
 * @property CallResponse $call
 * @property string $type
 */
class CallHLSBroadcastingStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $hlsPlaylistUrl = null,
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.hls_broadcasting_started" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
