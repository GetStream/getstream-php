<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryPollVotesRequest implements JsonSerializable
{
    public function __construct(public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $sort = null,
        public ?object $filter = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'next' => $this->next,
            'prev' => $this->prev,
            'sort' => $this->sort,
            'filter' => $this->filter,
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
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null,
            sort: $json['sort'] ?? null,
            filter: $json['filter'] ?? null
        );
    }
} 
