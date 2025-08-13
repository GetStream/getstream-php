<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageSize implements JsonSerializable
{
    public function __construct(public ?string $crop = null,
        public ?int $height = null,
        public ?string $resize = null,
        public ?int $width = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'crop' => $this->crop,
            'height' => $this->height,
            'resize' => $this->resize,
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
        
        return new static(crop: $json['crop'] ?? null,
            height: $json['height'] ?? null,
            resize: $json['resize'] ?? null,
            width: $json['width'] ?? null
        );
    }
} 
