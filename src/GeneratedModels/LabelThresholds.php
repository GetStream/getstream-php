<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class LabelThresholds implements JsonSerializable
{
    public function __construct(public ?int $block = null,
        public ?int $flag = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'block' => $this->block,
            'flag' => $this->flag,
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
        
        return new static(block: $json['block'] ?? null,
            flag: $json['flag'] ?? null
        );
    }
} 
