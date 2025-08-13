<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PublisherStatsResponse implements JsonSerializable
{
    public function __construct(public ?int $total = null,
        public ?int $unique = null,
        public ?array $byTrack = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'total' => $this->total,
            'unique' => $this->unique,
            'by_track' => $this->byTrack,
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
        
        return new static(total: $json['total'] ?? null,
            unique: $json['unique'] ?? null,
            byTrack: $json['by_track'] ?? null
        );
    }
} 
