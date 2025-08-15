<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ExternalStorage extends BaseModel
{
    public function __construct(
        public ?string $absAccountName = null,
        public ?string $absClientID = null,
        public ?string $absClientSecret = null,
        public ?string $absTenantID = null,
        public ?string $bucket = null,
        public ?string $gcsCredentials = null,
        public ?string $path = null,
        public ?string $s3APIKey = null,
        public ?string $s3CustomEndpoint = null,
        public ?string $s3Region = null,
        public ?string $s3SecretKey = null,
        public ?string $storageName = null,
        public ?int $storageType = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
