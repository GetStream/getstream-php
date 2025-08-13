<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EdgeResponse implements JsonSerializable
{
    public function __construct(public ?string $continentCode = null,
        public ?string $countryIsoCode = null,
        public ?int $green = null,
        public ?string $id = null,
        public ?string $latencyTestUrl = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?int $red = null,
        public ?string $subdivisionIsoCode = null,
        public ?int $yellow = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'continent_code' => $this->continentCode,
            'country_iso_code' => $this->countryIsoCode,
            'green' => $this->green,
            'id' => $this->id,
            'latency_test_url' => $this->latencyTestUrl,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'red' => $this->red,
            'subdivision_iso_code' => $this->subdivisionIsoCode,
            'yellow' => $this->yellow,
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
        
        return new static(continentCode: $json['continent_code'] ?? null,
            countryIsoCode: $json['country_iso_code'] ?? null,
            green: $json['green'] ?? null,
            id: $json['id'] ?? null,
            latencyTestUrl: $json['latency_test_url'] ?? null,
            latitude: $json['latitude'] ?? null,
            longitude: $json['longitude'] ?? null,
            red: $json['red'] ?? null,
            subdivisionIsoCode: $json['subdivision_iso_code'] ?? null,
            yellow: $json['yellow'] ?? null
        );
    }
} 
