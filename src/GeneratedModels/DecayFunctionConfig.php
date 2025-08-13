<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DecayFunctionConfig implements JsonSerializable
{
    public function __construct(public ?string $base = null,
        public ?string $decay = null,
        public ?string $direction = null,
        public ?string $offset = null,
        public ?string $origin = null,
        public ?string $scale = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'base' => $this->base,
            'decay' => $this->decay,
            'direction' => $this->direction,
            'offset' => $this->offset,
            'origin' => $this->origin,
            'scale' => $this->scale,
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
        
        return new static(base: $json['base'] ?? null,
            decay: $json['decay'] ?? null,
            direction: $json['direction'] ?? null,
            offset: $json['offset'] ?? null,
            origin: $json['origin'] ?? null,
            scale: $json['scale'] ?? null
        );
    }
} 
