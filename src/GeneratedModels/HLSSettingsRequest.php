<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HLSSettingsRequest extends BaseModel
{
    public function __construct(
        public ?array $qualityTracks = null,
        public ?bool $autoOn = null,
        public ?bool $enabled = null,
        public ?LayoutSettingsRequest $layout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
