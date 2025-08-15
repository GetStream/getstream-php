<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * BroadcastSettingsResponse is the payload for broadcasting settings
 */
class BroadcastSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?HLSSettingsResponse $hls = null,
        public ?RTMPSettingsResponse $rtmp = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
