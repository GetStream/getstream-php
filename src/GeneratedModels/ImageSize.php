<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImageSize extends BaseModel
{
    public function __construct(
        public ?string $crop = null, // Crop mode. One of: top, bottom, left, right, center
        public ?int $height = null, // Target image height
        public ?string $resize = null, // Resize method. One of: clip, crop, scale, fill
        public ?int $width = null, // Target image width
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
