<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * External storage
 */
class UpdateExternalStorageRequest extends BaseModel
{
    public function __construct(
        public ?string $bucket = null,    // The name of the bucket on the service provider 
        public ?string $storageType = null,    // The type of storage to use 
        public ?string $gcsCredentials = null,
        public ?string $path = null,    // The path prefix to use for storing files 
        public ?S3Request $awsS3 = null,
        public ?AzureRequest $azureBlob = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
