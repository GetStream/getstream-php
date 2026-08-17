<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * BroadcastSettingsResponse is the payload for broadcasting settings
 */
class BroadcastSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?HLSSettingsResponse $hls = null, // HLSSettings is the payload for HLS settings
        public ?RTMPSettingsResponse $rtmp = null, // RTMPSettingsResponse is the payload for RTMP settings
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
