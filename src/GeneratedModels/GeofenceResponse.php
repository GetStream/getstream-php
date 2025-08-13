<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GeofenceResponse implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?string $description = null,
        public ?string $type = null,
        public ?array $countryCodes = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'country_codes' => $this->countryCodes,
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
        
        return new static(name: $json['name'] ?? null,
            description: $json['description'] ?? null,
            type: $json['type'] ?? null,
            countryCodes: $json['country_codes'] ?? null
        );
    }
} 
