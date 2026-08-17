<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetExternalStorageGCSResponse extends BaseModel
{
    public function __construct(
        public ?string $bucket = null,
        public ?string $pathPrefix = null,
        public ?bool $credentialsSet = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
