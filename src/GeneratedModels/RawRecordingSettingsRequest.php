<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class RawRecordingSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Recording mode. One of: available, disabled, auto-on
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
