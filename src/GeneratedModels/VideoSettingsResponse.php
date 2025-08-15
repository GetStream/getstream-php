<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VideoSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $accessRequestEnabled = null,
        public ?bool $cameraDefaultOn = null,
        public ?string $cameraFacing = null,
        public ?bool $enabled = null,
        public ?TargetResolution $targetResolution = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
