<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $accessRequestEnabled
 * @property bool $enabled
 * @property TargetResolution|null $targetResolution
 */
class ScreensharingSettings extends BaseModel
{
    public function __construct(
        public ?bool $accessRequestEnabled = null,
        public ?bool $enabled = null,
        public ?TargetResolution $targetResolution = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
