<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $accessRequestEnabled
 * @property bool|null $enabled
 * @property TargetResolution|null $targetResolution
 */
class ScreensharingSettingsRequest extends BaseModel
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
