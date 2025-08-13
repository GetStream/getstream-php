<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryMessageFlagsPayload implements JsonSerializable
{
    public function __construct(public ?int $limit = null,
        public ?int $offset = null,
        public ?bool $showDeletedMessages = null,
        public ?string $userID = null,
        public ?array $sort = null,
        public ?object $filterConditions = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'offset' => $this->offset,
            'show_deleted_messages' => $this->showDeletedMessages,
            'user_id' => $this->userID,
            'sort' => $this->sort,
            'filter_conditions' => $this->filterConditions,
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
        
        return new static(limit: $json['limit'] ?? null,
            offset: $json['offset'] ?? null,
            showDeletedMessages: $json['show_deleted_messages'] ?? null,
            userID: $json['user_id'] ?? null,
            sort: $json['sort'] ?? null,
            filterConditions: $json['filter_conditions'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
