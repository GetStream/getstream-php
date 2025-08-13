<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Config for creating Azure Blob Storage storage
 */
class AzureRequest implements JsonSerializable
{
    public function __construct(public ?string $absAccountName = null,
        public ?string $absClientID = null,
        public ?string $absClientSecret = null,
        public ?string $absTenantID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'abs_account_name' => $this->absAccountName,
            'abs_client_id' => $this->absClientID,
            'abs_client_secret' => $this->absClientSecret,
            'abs_tenant_id' => $this->absTenantID,
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
            absTenantID: $json['abs_tenant_id'] ?? null
        );
    }
} 
