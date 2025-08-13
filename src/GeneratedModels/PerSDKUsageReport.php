<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PerSDKUsageReport implements JsonSerializable
{
    public function __construct(public ?int $total = null,
        public ?array $byVersion = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'total' => $this->total,
            'by_version' => $this->byVersion,
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
            byVersion: $json['by_version'] ?? null
        );
    }
} 
