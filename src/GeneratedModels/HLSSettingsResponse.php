<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * HLSSettings is the payload for HLS settings
 */
class HLSSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $autoOn = null,
        public ?bool $enabled = null,
        public ?array $qualityTracks = null,
        public ?LayoutSettingsResponse $layout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
