<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Images implements JsonSerializable
{
    public function __construct(public ?ImageData $fixedHeight = null,
        public ?ImageData $fixedHeightDownsampled = null,
        public ?ImageData $fixedHeightStill = null,
        public ?ImageData $fixedWidth = null,
        public ?ImageData $fixedWidthDownsampled = null,
        public ?ImageData $fixedWidthStill = null,
        public ?ImageData $original = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'fixed_height' => $this->fixedHeight,
            'fixed_height_downsampled' => $this->fixedHeightDownsampled,
            'fixed_height_still' => $this->fixedHeightStill,
            'fixed_width' => $this->fixedWidth,
            'fixed_width_downsampled' => $this->fixedWidthDownsampled,
            'fixed_width_still' => $this->fixedWidthStill,
            'original' => $this->original,
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
        
        return new static(fixedHeight: $json['fixed_height'] ?? null,
            fixedHeightDownsampled: $json['fixed_height_downsampled'] ?? null,
            fixedHeightStill: $json['fixed_height_still'] ?? null,
            fixedWidth: $json['fixed_width'] ?? null,
            fixedWidthDownsampled: $json['fixed_width_downsampled'] ?? null,
            fixedWidthStill: $json['fixed_width_still'] ?? null,
            original: $json['original'] ?? null
        );
    }
} 
