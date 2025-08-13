<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StartTranscriptionRequest implements JsonSerializable
{
    public function __construct(public ?bool $enableClosedCaptions = null,
        public ?string $language = null,
        public ?string $transcriptionExternalStorage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enable_closed_captions' => $this->enableClosedCaptions,
            'language' => $this->language,
            'transcription_external_storage' => $this->transcriptionExternalStorage,
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
        
        return new static(enableClosedCaptions: $json['enable_closed_captions'] ?? null,
            language: $json['language'] ?? null,
            transcriptionExternalStorage: $json['transcription_external_storage'] ?? null
        );
    }
} 
