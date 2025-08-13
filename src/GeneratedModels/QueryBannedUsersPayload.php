<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryBannedUsersPayload implements JsonSerializable
{
    public function __construct(public ?object $filterConditions = null,
        public ?bool $excludeExpiredBans = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
        public ?array $sort = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'filter_conditions' => $this->filterConditions,
            'exclude_expired_bans' => $this->excludeExpiredBans,
            'limit' => $this->limit,
            'offset' => $this->offset,
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
            excludeExpiredBans: $json['exclude_expired_bans'] ?? null,
            limit: $json['limit'] ?? null,
            offset: $json['offset'] ?? null,
            userID: $json['user_id'] ?? null,
            sort: $json['sort'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
