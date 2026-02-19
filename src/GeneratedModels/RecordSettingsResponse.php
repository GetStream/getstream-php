<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * RecordSettings is the payload for recording settings
 */
class RecordSettingsResponse extends BaseModel
{
    public function __construct(
        public ?LayoutSettingsResponse $layout = null,
        public ?bool $audioOnly = null,
        public ?string $mode = null,
        public ?string $quality = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
