<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SortParamRequest implements JsonSerializable
{
    public function __construct(public ?int $direction = null,
        public ?string $field = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'direction' => $this->direction,
            'field' => $this->field,
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
        
        return new static(direction: $json['direction'] ?? null,
            field: $json['field'] ?? null
        );
    }
} 
