<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StartClosedCaptionsRequest implements JsonSerializable
{
    public function __construct(public ?bool $enableTranscription = null,
        public ?string $externalStorage = null,
        public ?string $language = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enable_transcription' => $this->enableTranscription,
            'external_storage' => $this->externalStorage,
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
        
        return new static(enableTranscription: $json['enable_transcription'] ?? null,
            externalStorage: $json['external_storage'] ?? null,
            language: $json['language'] ?? null
        );
    }
} 
