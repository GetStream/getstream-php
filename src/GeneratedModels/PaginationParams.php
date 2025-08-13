<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PaginationParams implements JsonSerializable
{
    public function __construct(public ?int $limit = null,
        public ?int $offset = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'offset' => $this->offset,
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
        
        return new static(limit: $json['limit'] ?? null,
            offset: $json['offset'] ?? null
        );
    }
} 
