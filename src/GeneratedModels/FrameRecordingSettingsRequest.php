<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FrameRecordingSettingsRequest extends BaseModel
{
    public function __construct(
        public ?int $captureIntervalInSeconds = null,
        public ?string $mode = null,
        public ?string $quality = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
