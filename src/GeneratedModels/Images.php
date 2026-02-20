<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Images extends BaseModel
{
    public function __construct(
        public ?ImageData $original = null,
        public ?ImageData $fixedHeight = null,
        public ?ImageData $fixedHeightStill = null,
        public ?ImageData $fixedHeightDownsampled = null,
        public ?ImageData $fixedWidth = null,
        public ?ImageData $fixedWidthStill = null,
        public ?ImageData $fixedWidthDownsampled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
