<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageSize extends BaseModel
{
    public function __construct(
        public ?string $crop = null,    // Crop mode 
        public ?int $height = null,    // Target image height 
        public ?string $resize = null,    // Resize method 
        public ?int $width = null,    // Target image width 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
