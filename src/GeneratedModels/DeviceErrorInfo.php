<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeviceErrorInfo implements JsonSerializable
{
    public function __construct(public ?string $errorMessage = null,
        public ?string $provider = null,
        public ?string $providerName = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'error_message' => $this->errorMessage,
            'provider' => $this->provider,
            'provider_name' => $this->providerName,
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
        
        return new static(errorMessage: $json['error_message'] ?? null,
            provider: $json['provider'] ?? null,
            providerName: $json['provider_name'] ?? null
        );
    }
} 
