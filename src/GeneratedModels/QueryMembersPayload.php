<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Client request
 */
class QueryMembersPayload implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?object $filterConditions = null,
        public ?string $id = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
        public ?array $members = null,
        public ?array $sort = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'filter_conditions' => $this->filterConditions,
            'id' => $this->id,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'user_id' => $this->userID,
            'members' => $this->members,
            'sort' => $this->sort,
            'user' => $this->user,
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
            filterConditions: $json['filter_conditions'] ?? null,
            id: $json['id'] ?? null,
            limit: $json['limit'] ?? null,
            offset: $json['offset'] ?? null,
            userID: $json['user_id'] ?? null,
            members: $json['members'] ?? null,
            sort: $json['sort'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
