<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * RecordSettings is the payload for recording settings
 */
class RecordSettingsResponse implements JsonSerializable
{
    public function __construct(public ?bool $audioOnly = null,
        public ?string $mode = null,
        public ?string $quality = null,
        public ?LayoutSettingsResponse $layout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio_only' => $this->audioOnly,
            'mode' => $this->mode,
            'quality' => $this->quality,
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
        
        return new static(audioOnly: $json['audio_only'] ?? null,
            mode: $json['mode'] ?? null,
            quality: $json['quality'] ?? null,
            layout: $json['layout'] ?? null
        );
    }
} 
