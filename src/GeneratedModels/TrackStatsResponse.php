<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TrackStatsResponse implements JsonSerializable
{
    public function __construct(public ?int $durationSeconds = null,
        public ?string $trackType = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration_seconds' => $this->durationSeconds,
            'track_type' => $this->trackType,
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
        
        return new static(durationSeconds: $json['duration_seconds'] ?? null,
            trackType: $json['track_type'] ?? null
        );
    }
} 
