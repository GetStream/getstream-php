<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class STTEgressConfig implements JsonSerializable
{
    public function __construct(public ?bool $closedCaptionsEnabled = null,
        public ?string $language = null,
        public ?string $storageName = null,
        public ?bool $translationsEnabled = null,
        public ?bool $uploadTranscriptions = null,
        public ?string $whisperServerBaseUrl = null,
        public ?array $translationLanguages = null,
        public ?ExternalStorage $externalStorage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'closed_captions_enabled' => $this->closedCaptionsEnabled,
            'language' => $this->language,
            'storage_name' => $this->storageName,
            'translations_enabled' => $this->translationsEnabled,
            'upload_transcriptions' => $this->uploadTranscriptions,
            'whisper_server_base_url' => $this->whisperServerBaseUrl,
            'translation_languages' => $this->translationLanguages,
            'external_storage' => $this->externalStorage,
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
        
        return new static(closedCaptionsEnabled: $json['closed_captions_enabled'] ?? null,
            language: $json['language'] ?? null,
            storageName: $json['storage_name'] ?? null,
            translationsEnabled: $json['translations_enabled'] ?? null,
            uploadTranscriptions: $json['upload_transcriptions'] ?? null,
            whisperServerBaseUrl: $json['whisper_server_base_url'] ?? null,
            translationLanguages: $json['translation_languages'] ?? null,
            externalStorage: $json['external_storage'] ?? null
        );
    }
} 
