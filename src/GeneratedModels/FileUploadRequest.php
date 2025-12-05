<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $file
 * @property OnlyUserID|null $user
 */
class FileUploadRequest extends BaseModel
{
    public function __construct(
        public ?string $file = null, // file field
        public ?OnlyUserID $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
