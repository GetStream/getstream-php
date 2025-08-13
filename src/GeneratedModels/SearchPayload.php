<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SearchPayload implements JsonSerializable
{
    public function __construct(public ?object $filterConditions = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $query = null,
        public ?array $sort = null,
        public ?object $messageFilterConditions = null,
        public ?MessageOptions $messageOptions = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'filter_conditions' => $this->filterConditions,
            'limit' => $this->limit,
            'next' => $this->next,
            'offset' => $this->offset,
            'query' => $this->query,
            'sort' => $this->sort,
            'message_filter_conditions' => $this->messageFilterConditions,
            'message_options' => $this->messageOptions,
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
        
        return new static(filterConditions: $json['filter_conditions'] ?? null,
            limit: $json['limit'] ?? null,
            next: $json['next'] ?? null,
            offset: $json['offset'] ?? null,
            query: $json['query'] ?? null,
            sort: $json['sort'] ?? null,
            messageFilterConditions: $json['message_filter_conditions'] ?? null,
            messageOptions: $json['message_options'] ?? null
        );
    }
} 
