<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CustomCheckFlag implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?string $reason = null,
        public ?array $labels = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'reason' => $this->reason,
            'labels' => $this->labels,
            'custom' => $this->custom,
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
        
        return new static(type: $json['type'] ?? null,
            reason: $json['reason'] ?? null,
            labels: $json['labels'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
