<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $enabled
 * @property HLSSettingsRequest|null $hls
 * @property RTMPSettingsRequest|null $rtmp
 */
class BroadcastSettingsRequest extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?HLSSettingsRequest $hls = null,
        public ?RTMPSettingsRequest $rtmp = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
