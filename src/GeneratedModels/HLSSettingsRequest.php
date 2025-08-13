<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HLSSettingsRequest implements JsonSerializable
{
    public function __construct(public ?array $qualityTracks = null,
        public ?bool $autoOn = null,
        public ?bool $enabled = null,
        public ?LayoutSettingsRequest $layout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'quality_tracks' => $this->qualityTracks,
            'auto_on' => $this->autoOn,
            'enabled' => $this->enabled,
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
        
        return new static(qualityTracks: $json['quality_tracks'] ?? null,
            autoOn: $json['auto_on'] ?? null,
            enabled: $json['enabled'] ?? null,
            layout: $json['layout'] ?? null
        );
    }
} 
