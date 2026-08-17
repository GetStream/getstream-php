<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertExternalStorageGCSRequest extends BaseModel
{
    public function __construct(
        public ?string $bucket = null,
        public ?string $credentials = null,
        public ?string $pathPrefix = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
