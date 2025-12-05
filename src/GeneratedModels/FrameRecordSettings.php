<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $captureIntervalInSeconds
 * @property string $mode
 * @property string|null $quality
 */
class FrameRecordSettings extends BaseModel
{
    public function __construct(
        public ?int $captureIntervalInSeconds = null,
        public ?string $mode = null,
        public ?string $quality = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
