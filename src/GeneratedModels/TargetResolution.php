<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $bitrate
 * @property int $height
 * @property int $width
 */
class TargetResolution extends BaseModel
{
    public function __construct(
        public ?int $bitrate = null,
        public ?int $height = null,
        public ?int $width = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
