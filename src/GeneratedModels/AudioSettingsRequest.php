<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AudioSettingsRequest implements JsonSerializable
{
    public function __construct(public ?string $defaultDevice = null,
        public ?bool $accessRequestEnabled = null,
        public ?bool $micDefaultOn = null,
        public ?bool $opusDtxEnabled = null,
        public ?bool $redundantCodingEnabled = null,
        public ?bool $speakerDefaultOn = null,
        public ?NoiseCancellationSettings $noiseCancellation = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'default_device' => $this->defaultDevice,
            'access_request_enabled' => $this->accessRequestEnabled,
            'mic_default_on' => $this->micDefaultOn,
            'opus_dtx_enabled' => $this->opusDtxEnabled,
            'redundant_coding_enabled' => $this->redundantCodingEnabled,
            'speaker_default_on' => $this->speakerDefaultOn,
            'noise_cancellation' => $this->noiseCancellation,
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
        
        return new static(defaultDevice: $json['default_device'] ?? null,
            accessRequestEnabled: $json['access_request_enabled'] ?? null,
            micDefaultOn: $json['mic_default_on'] ?? null,
            opusDtxEnabled: $json['opus_dtx_enabled'] ?? null,
            redundantCodingEnabled: $json['redundant_coding_enabled'] ?? null,
            speakerDefaultOn: $json['speaker_default_on'] ?? null,
            noiseCancellation: $json['noise_cancellation'] ?? null
        );
    }
} 
