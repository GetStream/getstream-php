<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * RTMPBroadcastRequest is the payload for starting an RTMP broadcast.
 *
 * @property string $name
 * @property string $streamUrl
 * @property string|null $quality
 * @property string|null $streamKey
 * @property LayoutSettingsRequest|null $layout
 */
class RTMPBroadcastRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name identifier for RTMP broadcast, must be unique in call
        public ?string $streamUrl = null, // URL for the RTMP server to send the call to
        public ?string $quality = null, // If provided, will override the call's RTMP settings quality
        public ?string $streamKey = null, // If provided, will be appended at the end of stream_url
        public ?LayoutSettingsRequest $layout = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
