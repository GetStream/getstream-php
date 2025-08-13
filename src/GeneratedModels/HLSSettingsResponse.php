<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * HLSSettings is the payload for HLS settings
 */
class HLSSettingsResponse implements JsonSerializable
{
    public function __construct(public ?bool $autoOn = null,
        public ?bool $enabled = null,
        public ?array $qualityTracks = null,
        public ?LayoutSettingsResponse $layout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'auto_on' => $this->autoOn,
            'enabled' => $this->enabled,
            'quality_tracks' => $this->qualityTracks,
            'layout' => $this->layout,
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
        
        return new static(autoOn: $json['auto_on'] ?? null,
            enabled: $json['enabled'] ?? null,
            qualityTracks: $json['quality_tracks'] ?? null,
            layout: $json['layout'] ?? null
        );
    }
} 
