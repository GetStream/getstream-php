<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationPayload implements JsonSerializable
{
    public function __construct(public ?array $images = null,
        public ?array $texts = null,
        public ?array $videos = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'images' => $this->images,
            'texts' => $this->texts,
            'videos' => $this->videos,
            'custom' => $this->custom,
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
        
        return new static(images: $json['images'] ?? null,
            texts: $json['texts'] ?? null,
            videos: $json['videos'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
