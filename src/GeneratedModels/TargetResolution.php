<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TargetResolution implements JsonSerializable
{
    public function __construct(public ?int $bitrate = null,
        public ?int $height = null,
        public ?int $width = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bitrate' => $this->bitrate,
            'height' => $this->height,
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
        
        return new static(bitrate: $json['bitrate'] ?? null,
            height: $json['height'] ?? null,
            width: $json['width'] ?? null
        );
    }
} 
