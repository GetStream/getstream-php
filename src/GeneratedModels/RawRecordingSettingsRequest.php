<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RawRecordingSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Recording mode. One of: available, disabled, auto-on
        public ?bool $audioOnly = null, // If true, only audio tracks will be recorded
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
