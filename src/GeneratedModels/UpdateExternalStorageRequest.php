<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * External storage
 */
class UpdateExternalStorageRequest implements JsonSerializable
{
    public function __construct(public ?string $bucket = null,
        public ?string $storageType = null,
        public ?string $gcsCredentials = null,
        public ?string $path = null,
        public ?S3Request $awsS3 = null,
        public ?AzureRequest $azureBlob = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bucket' => $this->bucket,
            'storage_type' => $this->storageType,
            'gcs_credentials' => $this->gcsCredentials,
            'path' => $this->path,
            'aws_s3' => $this->awsS3,
            'azure_blob' => $this->azureBlob,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(bucket: $json['bucket'] ?? null,
            storageType: $json['storage_type'] ?? null,
            gcsCredentials: $json['gcs_credentials'] ?? null,
            path: $json['path'] ?? null,
            awsS3: $json['aws_s3'] ?? null,
            azureBlob: $json['azure_blob'] ?? null
        );
    }
} 
