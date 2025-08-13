<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class IngressVideoLayer implements JsonSerializable
{
    public function __construct(public ?int $bitrate = null,
        public ?string $codec = null,
        public ?int $frameRate = null,
        public ?int $maxDimension = null,
        public ?int $minDimension = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bitrate' => $this->bitrate,
            'codec' => $this->codec,
            'frame_rate' => $this->frameRate,
            'max_dimension' => $this->maxDimension,
            'min_dimension' => $this->minDimension,
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
            codec: $json['codec'] ?? null,
            frameRate: $json['frame_rate'] ?? null,
            maxDimension: $json['max_dimension'] ?? null,
            minDimension: $json['min_dimension'] ?? null
        );
    }
} 
