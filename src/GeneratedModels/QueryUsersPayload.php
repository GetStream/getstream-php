<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryUsersPayload implements JsonSerializable
{
    public function __construct(public ?object $filterConditions = null,
        public ?bool $includeDeactivatedUsers = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?bool $presence = null,
        public ?string $userID = null,
        public ?array $sort = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'filter_conditions' => $this->filterConditions,
            'include_deactivated_users' => $this->includeDeactivatedUsers,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'presence' => $this->presence,
            'user_id' => $this->userID,
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
        
        return new static(filterConditions: $json['filter_conditions'] ?? null,
            includeDeactivatedUsers: $json['include_deactivated_users'] ?? null,
            limit: $json['limit'] ?? null,
            offset: $json['offset'] ?? null,
            presence: $json['presence'] ?? null,
            userID: $json['user_id'] ?? null,
            sort: $json['sort'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
