<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FrameRecordingEgressConfig implements JsonSerializable
{
    public function __construct(public ?int $captureIntervalInSeconds = null,
        public ?string $storageName = null,
        public ?ExternalStorage $externalStorage = null,
        public ?Quality $quality = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'capture_interval_in_seconds' => $this->captureIntervalInSeconds,
            'storage_name' => $this->storageName,
            'external_storage' => $this->externalStorage,
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
        
        return new static(captureIntervalInSeconds: $json['capture_interval_in_seconds'] ?? null,
            storageName: $json['storage_name'] ?? null,
            externalStorage: $json['external_storage'] ?? null,
            quality: $json['quality'] ?? null
        );
    }
} 
