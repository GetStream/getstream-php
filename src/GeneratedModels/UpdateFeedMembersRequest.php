<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateFeedMembersRequest implements JsonSerializable
{
    public function __construct(public ?string $operation = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $members = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'operation' => $this->operation,
            'limit' => $this->limit,
            'next' => $this->next,
            'prev' => $this->prev,
            'members' => $this->members,
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
        
        return new static(operation: $json['operation'] ?? null,
            limit: $json['limit'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null,
            members: $json['members'] ?? null
        );
    }
} 
