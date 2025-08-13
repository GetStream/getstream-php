<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Config for creating Amazon S3 storage.
 */
class S3Request implements JsonSerializable
{
    public function __construct(public ?string $s3Region = null,
        public ?string $s3APIKey = null,
        public ?string $s3CustomEndpointUrl = null,
        public ?string $s3Secret = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            's3_region' => $this->s3Region,
            's3_api_key' => $this->s3APIKey,
            's3_custom_endpoint_url' => $this->s3CustomEndpointUrl,
            's3_secret' => $this->s3Secret,
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
        
        return new static(s3Region: $json['s3_region'] ?? null,
            s3APIKey: $json['s3_api_key'] ?? null,
            s3CustomEndpointUrl: $json['s3_custom_endpoint_url'] ?? null,
            s3Secret: $json['s3_secret'] ?? null
        );
    }
} 
