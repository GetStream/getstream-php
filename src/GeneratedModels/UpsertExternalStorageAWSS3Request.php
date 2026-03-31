<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertExternalStorageAWSS3Request extends BaseModel
{
    public function __construct(
        public ?string $roleArn = null,
        public ?string $bucket = null,
        public ?string $region = null,
        public ?string $pathPrefix = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
