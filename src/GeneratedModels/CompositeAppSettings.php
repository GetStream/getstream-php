<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CompositeAppSettings implements JsonSerializable
{
    public function __construct(public ?string $jsonEncodedSettings = null,
        public ?string $url = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'json_encoded_settings' => $this->jsonEncodedSettings,
            'url' => $this->url,
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
        
        return new static(jsonEncodedSettings: $json['json_encoded_settings'] ?? null,
            url: $json['url'] ?? null
        );
    }
} 
