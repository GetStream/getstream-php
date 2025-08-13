<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressHLSResponse implements JsonSerializable
{
    public function __construct(public ?string $playlistUrl = null,
        public ?string $status = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'playlist_url' => $this->playlistUrl,
            'status' => $this->status,
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
            status: $json['status'] ?? null
        );
    }
} 
