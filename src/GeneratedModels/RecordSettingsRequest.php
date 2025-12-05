<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $mode
 * @property bool|null $audioOnly
 * @property string|null $quality
 * @property LayoutSettingsRequest|null $layout
 */
class RecordSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?bool $audioOnly = null,
        public ?string $quality = null,
        public ?LayoutSettingsRequest $layout = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
