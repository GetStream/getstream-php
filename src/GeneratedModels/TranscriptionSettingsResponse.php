<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TranscriptionSettingsResponse implements JsonSerializable
{
    public function __construct(public ?string $closedCaptionMode = null,
        public ?string $language = null,
        public ?string $mode = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'closed_caption_mode' => $this->closedCaptionMode,
            'language' => $this->language,
            'mode' => $this->mode,
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
        
        return new static(closedCaptionMode: $json['closed_caption_mode'] ?? null,
            language: $json['language'] ?? null,
            mode: $json['mode'] ?? null
        );
    }
} 
