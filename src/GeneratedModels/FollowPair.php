<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FollowPair implements JsonSerializable
{
    public function __construct(public ?string $source = null,
        public ?string $target = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'source' => $this->source,
            'target' => $this->target,
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
        
        return new static(source: $json['source'] ?? null,
            target: $json['target'] ?? null
        );
    }
} 
