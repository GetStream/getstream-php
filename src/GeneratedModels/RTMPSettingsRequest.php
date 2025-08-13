<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RTMPSettingsRequest implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?string $quality = null,
        public ?LayoutSettingsRequest $layout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
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
        
        return new static(enabled: $json['enabled'] ?? null,
            quality: $json['quality'] ?? null,
            layout: $json['layout'] ?? null
        );
    }
} 
