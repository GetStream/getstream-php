<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string|null $file
 * @property string|null $thumbUrl
 * @property array<ImageSize>|null $uploadSizes
 */
class ImageUploadResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $file = null,
        public ?string $thumbUrl = null,
        /** @var array<ImageSize>|null Array of image size configurations */
        #[ArrayOf(ImageSize::class)]
        public ?array $uploadSizes = null, // Array of image size configurations
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
