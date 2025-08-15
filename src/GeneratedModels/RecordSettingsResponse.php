<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * RecordSettings is the payload for recording settings
 */
class RecordSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $audioOnly = null,
        public ?string $mode = null,
        public ?string $quality = null,
        public ?LayoutSettingsResponse $layout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
