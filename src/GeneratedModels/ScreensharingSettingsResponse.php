<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ScreensharingSettingsResponse extends BaseModel
{
    public function __construct(
        public ?TargetResolution $targetResolution = null,
        public ?bool $enabled = null,
        public ?bool $accessRequestEnabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
