<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelGetOrCreateRequest implements JsonSerializable
{
    public function __construct(public ?bool $hideForCreator = null,
        public ?bool $state = null,
        public ?bool $threadUnreadCounts = null,
        public ?ChannelInput $data = null,
        public ?PaginationParams $members = null,
        public ?MessagePaginationParams $messages = null,
        public ?PaginationParams $watchers = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'hide_for_creator' => $this->hideForCreator,
            'state' => $this->state,
            'thread_unread_counts' => $this->threadUnreadCounts,
            'data' => $this->data,
            'members' => $this->members,
            'messages' => $this->messages,
            'watchers' => $this->watchers,
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
        
        return new static(hideForCreator: $json['hide_for_creator'] ?? null,
            state: $json['state'] ?? null,
            threadUnreadCounts: $json['thread_unread_counts'] ?? null,
            data: $json['data'] ?? null,
            members: $json['members'] ?? null,
            messages: $json['messages'] ?? null,
            watchers: $json['watchers'] ?? null
        );
    }
} 
