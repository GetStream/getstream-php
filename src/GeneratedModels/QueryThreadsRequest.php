<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryThreadsRequest implements JsonSerializable
{
    public function __construct(public ?int $limit = null,
        public ?int $memberLimit = null,
        public ?string $next = null,
        public ?int $participantLimit = null,
        public ?string $prev = null,
        public ?int $replyLimit = null,
        public ?string $userID = null,
        public ?array $sort = null,
        public ?object $filter = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'member_limit' => $this->memberLimit,
            'next' => $this->next,
            'participant_limit' => $this->participantLimit,
            'prev' => $this->prev,
            'reply_limit' => $this->replyLimit,
            'user_id' => $this->userID,
            'sort' => $this->sort,
            'filter' => $this->filter,
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
            memberLimit: $json['member_limit'] ?? null,
            next: $json['next'] ?? null,
            participantLimit: $json['participant_limit'] ?? null,
            prev: $json['prev'] ?? null,
            replyLimit: $json['reply_limit'] ?? null,
            userID: $json['user_id'] ?? null,
            sort: $json['sort'] ?? null,
            filter: $json['filter'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
