<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Quality implements JsonSerializable
{
    public function __construct(public ?int $bitdepth = null,
        public ?int $framerate = null,
        public ?int $height = null,
        public ?string $name = null,
        public ?int $videoBitrate = null,
        public ?int $width = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bitdepth' => $this->bitdepth,
            'framerate' => $this->framerate,
            'height' => $this->height,
            'name' => $this->name,
            'video_bitrate' => $this->videoBitrate,
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
        
        return new static(bitdepth: $json['bitdepth'] ?? null,
            framerate: $json['framerate'] ?? null,
            height: $json['height'] ?? null,
            name: $json['name'] ?? null,
            videoBitrate: $json['video_bitrate'] ?? null,
            width: $json['width'] ?? null
        );
    }
} 
