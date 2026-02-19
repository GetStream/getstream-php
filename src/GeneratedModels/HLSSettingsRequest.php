<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class HLSSettingsRequest extends BaseModel
{
    public function __construct(
        public ?array $qualityTracks = null, // Quality tracks for HLS. One of: 360p, 480p, 720p, 1080p, 1440p, portrait-360x640, portrait-480x854, portrait-720x1280, portrait-1080x1920, portrait-1440x2560
        public ?bool $autoOn = null, // Whether HLS broadcasting should start automatically
        public ?bool $enabled = null, // Whether HLS broadcasting is enabled
        public ?LayoutSettingsRequest $layout = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
