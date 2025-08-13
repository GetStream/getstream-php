<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DataDogInfo implements JsonSerializable
{
    public function __construct(public ?string $apiKey = null,
        public ?bool $enabled = null,
        public ?string $site = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'api_key' => $this->apiKey,
            'enabled' => $this->enabled,
            'site' => $this->site,
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
        
        return new static(apiKey: $json['api_key'] ?? null,
            enabled: $json['enabled'] ?? null,
            site: $json['site'] ?? null
        );
    }
} 
