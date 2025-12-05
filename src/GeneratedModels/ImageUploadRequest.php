<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $file
 * @property array<ImageSize>|null $uploadSizes
 * @property OnlyUserID|null $user
 */
class ImageUploadRequest extends BaseModel
{
    public function __construct(
        public ?string $file = null,
        /** @var array<ImageSize>|null field with JSON-encoded array of image size configurations */
        #[ArrayOf(ImageSize::class)]
        public ?array $uploadSizes = null, // field with JSON-encoded array of image size configurations
        public ?OnlyUserID $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
