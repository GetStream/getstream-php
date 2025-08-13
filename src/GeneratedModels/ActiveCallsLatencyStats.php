<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActiveCallsLatencyStats implements JsonSerializable
{
    public function __construct(public ?int $p50 = null,
        public ?int $p90 = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'p50' => $this->p50,
            'p90' => $this->p90,
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
        
        return new static(p50: $json['p50'] ?? null,
            p90: $json['p90'] ?? null
        );
    }
} 
