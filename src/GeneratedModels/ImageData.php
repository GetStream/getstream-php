<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageData extends BaseModel
{
    public function __construct(
        public ?string $frames = null,
        public ?string $height = null,
        public ?string $size = null,
        public ?string $url = null,
        public ?string $width = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
