<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageData implements JsonSerializable
{
    public function __construct(public ?string $frames = null,
        public ?string $height = null,
        public ?string $size = null,
        public ?string $url = null,
        public ?string $width = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'frames' => $this->frames,
            'height' => $this->height,
            'size' => $this->size,
            'url' => $this->url,
            'width' => $this->width,
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
        
        return new static(frames: $json['frames'] ?? null,
            height: $json['height'] ?? null,
            size: $json['size'] ?? null,
            url: $json['url'] ?? null,
            width: $json['width'] ?? null
        );
    }
} 
