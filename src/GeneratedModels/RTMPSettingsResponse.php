<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * RTMPSettingsResponse is the payload for RTMP settings
 *
 * @property bool $enabled
 * @property string $quality
 * @property LayoutSettingsResponse $layout
 */
class RTMPSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $quality = null,
        public ?LayoutSettingsResponse $layout = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
