<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryMessageHistoryRequest implements JsonSerializable
{
    public function __construct(public ?object $filter = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $sort = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'filter' => $this->filter,
            'limit' => $this->limit,
            'next' => $this->next,
            'prev' => $this->prev,
            'sort' => $this->sort,
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
        
        return new static(filter: $json['filter'] ?? null,
            limit: $json['limit'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null,
            sort: $json['sort'] ?? null
        );
    }
} 
