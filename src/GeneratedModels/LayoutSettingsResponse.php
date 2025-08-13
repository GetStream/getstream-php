<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class LayoutSettingsResponse implements JsonSerializable
{
    public function __construct(public ?string $externalAppUrl = null,
        public ?string $externalCssUrl = null,
        public ?string $name = null,
        public ?bool $detectOrientation = null,
        public ?object $options = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'external_app_url' => $this->externalAppUrl,
            'external_css_url' => $this->externalCssUrl,
            'name' => $this->name,
            'detect_orientation' => $this->detectOrientation,
            'options' => $this->options,
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
        
        return new static(externalAppUrl: $json['external_app_url'] ?? null,
            externalCssUrl: $json['external_css_url'] ?? null,
            name: $json['name'] ?? null,
            detectOrientation: $json['detect_orientation'] ?? null,
            options: $json['options'] ?? null
        );
    }
} 
