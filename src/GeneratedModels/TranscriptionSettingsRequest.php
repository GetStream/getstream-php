<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TranscriptionSettingsRequest implements JsonSerializable
{
    public function __construct(public ?string $mode = null,
        public ?string $closedCaptionMode = null,
        public ?string $language = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'mode' => $this->mode,
            'closed_caption_mode' => $this->closedCaptionMode,
            'language' => $this->language,
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
        
        return new static(mode: $json['mode'] ?? null,
            closedCaptionMode: $json['closed_caption_mode'] ?? null,
            language: $json['language'] ?? null
        );
    }
} 
