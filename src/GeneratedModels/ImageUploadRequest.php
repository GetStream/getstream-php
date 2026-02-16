<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ImageUploadRequest extends BaseModel
{
    public function __construct(
        public ?string $file = null,
        /** @var array<ImageSize>|null */
        #[ArrayOf(ImageSize::class)]
        public ?array $uploadSizes = null, // field with JSON-encoded array of image size configurations
        public ?OnlyUserID $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
