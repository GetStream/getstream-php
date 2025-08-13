<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ExternalStorage implements JsonSerializable
{
    public function __construct(public ?string $absAccountName = null,
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
        public ?int $storageType = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'abs_account_name' => $this->absAccountName,
            'abs_client_id' => $this->absClientID,
            'abs_client_secret' => $this->absClientSecret,
            'abs_tenant_id' => $this->absTenantID,
            'bucket' => $this->bucket,
            'gcs_credentials' => $this->gcsCredentials,
            'path' => $this->path,
            's3_api_key' => $this->s3APIKey,
            's3_custom_endpoint' => $this->s3CustomEndpoint,
            's3_region' => $this->s3Region,
            's3_secret_key' => $this->s3SecretKey,
            'storage_name' => $this->storageName,
            'storage_type' => $this->storageType,
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
        
        return new static(absAccountName: $json['abs_account_name'] ?? null,
            absClientID: $json['abs_client_id'] ?? null,
            absClientSecret: $json['abs_client_secret'] ?? null,
            absTenantID: $json['abs_tenant_id'] ?? null,
            bucket: $json['bucket'] ?? null,
            gcsCredentials: $json['gcs_credentials'] ?? null,
            path: $json['path'] ?? null,
            s3APIKey: $json['s3_api_key'] ?? null,
            s3CustomEndpoint: $json['s3_custom_endpoint'] ?? null,
            s3Region: $json['s3_region'] ?? null,
            s3SecretKey: $json['s3_secret_key'] ?? null,
            storageName: $json['storage_name'] ?? null,
            storageType: $json['storage_type'] ?? null
        );
    }
} 
