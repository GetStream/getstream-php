<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * RTMPBroadcastRequest is the payload for starting an RTMP broadcast.
 */
class RTMPBroadcastRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name identifier for RTMP broadcast, must be unique in call
        public ?string $streamUrl = null, // URL for the RTMP server to send the call to
        public ?string $streamKey = null, // If provided, will be appended at the end of stream_url
        public ?string $quality = null, // If provided, will override the call's RTMP settings quality. One of: 360p, 480p, 720p, 1080p, 1440p, portrait-360x640, portrait-480x854, portrait-720x1280, portrait-1080x1920, portrait-1440x2560
        public ?LayoutSettingsRequest $layout = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
