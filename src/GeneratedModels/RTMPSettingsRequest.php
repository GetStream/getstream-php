<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RTMPSettingsRequest extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $quality = null,    // Resolution to set for the RTMP stream 
        public ?LayoutSettingsRequest $layout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
