<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Create external storage
 */
class CreateExternalStorageRequest extends BaseModel
{
    public function __construct(
        public ?S3Request $awsS3 = null,
        public ?AzureRequest $azureBlob = null,
        public ?string $name = null, // The name of the provider, this must be unique
        public ?string $storageType = null, // The type of storage to use
        public ?string $bucket = null, // The name of the bucket on the service provider
        public ?string $path = null, // The path prefix to use for storing files
        public ?string $gcsCredentials = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
