<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HLSEgressConfig implements JsonSerializable
{
    public function __construct(public ?string $playlistUrl = null,
        public ?int $startUnixNano = null,
        public ?array $qualities = null,
        public ?CompositeAppSettings $compositeAppSettings = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'playlist_url' => $this->playlistUrl,
            'start_unix_nano' => $this->startUnixNano,
            'qualities' => $this->qualities,
            'composite_app_settings' => $this->compositeAppSettings,
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
        
        return new static(playlistUrl: $json['playlist_url'] ?? null,
            startUnixNano: $json['start_unix_nano'] ?? null,
            qualities: $json['qualities'] ?? null,
            compositeAppSettings: $json['composite_app_settings'] ?? null
        );
    }
} 
