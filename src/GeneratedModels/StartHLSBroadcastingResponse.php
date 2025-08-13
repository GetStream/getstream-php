<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * StartHLSBroadcastingResponse is the payload for starting an HLS broadcasting.
 */
class StartHLSBroadcastingResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $playlistUrl = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'playlist_url' => $this->playlistUrl,
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
        
        return new static(duration: $json['duration'] ?? null,
            playlistUrl: $json['playlist_url'] ?? null
        );
    }
} 
