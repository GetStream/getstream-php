<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressRTMPResponse implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?\DateTime $startedAt = null,
        public ?string $streamKey = null,
        public ?string $streamUrl = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'started_at' => $this->startedAt,
            'stream_key' => $this->streamKey,
            'stream_url' => $this->streamUrl,
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
        
        return new static(name: $json['name'] ?? null,
            startedAt: $json['started_at'] ?? null,
            streamKey: $json['stream_key'] ?? null,
            streamUrl: $json['stream_url'] ?? null
        );
    }
} 
