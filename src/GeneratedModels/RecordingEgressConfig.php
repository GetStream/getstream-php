<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RecordingEgressConfig implements JsonSerializable
{
    public function __construct(public ?bool $audioOnly = null,
        public ?string $storageName = null,
        public ?CompositeAppSettings $compositeAppSettings = null,
        public ?ExternalStorage $externalStorage = null,
        public ?Quality $quality = null,
        public ?VideoOrientation $videoOrientationHint = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio_only' => $this->audioOnly,
            'storage_name' => $this->storageName,
            'composite_app_settings' => $this->compositeAppSettings,
            'external_storage' => $this->externalStorage,
            'quality' => $this->quality,
            'video_orientation_hint' => $this->videoOrientationHint,
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
        
        return new static(audioOnly: $json['audio_only'] ?? null,
            storageName: $json['storage_name'] ?? null,
            compositeAppSettings: $json['composite_app_settings'] ?? null,
            externalStorage: $json['external_storage'] ?? null,
            quality: $json['quality'] ?? null,
            videoOrientationHint: $json['video_orientation_hint'] ?? null
        );
    }
} 
