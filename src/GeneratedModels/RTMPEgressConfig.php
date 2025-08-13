<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RTMPEgressConfig implements JsonSerializable
{
    public function __construct(public ?string $rtmpLocation = null,
        public ?CompositeAppSettings $compositeAppSettings = null,
        public ?Quality $quality = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'rtmp_location' => $this->rtmpLocation,
            'composite_app_settings' => $this->compositeAppSettings,
            'quality' => $this->quality,
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
        
        return new static(rtmpLocation: $json['rtmp_location'] ?? null,
            compositeAppSettings: $json['composite_app_settings'] ?? null,
            quality: $json['quality'] ?? null
        );
    }
} 
