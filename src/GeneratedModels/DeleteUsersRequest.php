<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteUsersRequest implements JsonSerializable
{
    public function __construct(public ?array $userIds = null,
        public ?string $calls = null,
        public ?string $conversations = null,
        public ?bool $files = null,
        public ?string $messages = null,
        public ?string $newCallOwnerID = null,
        public ?string $newChannelOwnerID = null,
        public ?string $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_ids' => $this->userIds,
            'calls' => $this->calls,
            'conversations' => $this->conversations,
            'files' => $this->files,
            'messages' => $this->messages,
            'new_call_owner_id' => $this->newCallOwnerID,
            'new_channel_owner_id' => $this->newChannelOwnerID,
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
        
        return new static(userIds: $json['user_ids'] ?? null,
            calls: $json['calls'] ?? null,
            conversations: $json['conversations'] ?? null,
            files: $json['files'] ?? null,
            messages: $json['messages'] ?? null,
            newCallOwnerID: $json['new_call_owner_id'] ?? null,
            newChannelOwnerID: $json['new_channel_owner_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
