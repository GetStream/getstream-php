<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property string|null $qualityName
 * @property LayoutSettings|null $layout
 * @property RTMPLocation|null $location
 */
class RTMPSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $qualityName = null,
        public ?LayoutSettings $layout = null,
        public ?RTMPLocation $location = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
