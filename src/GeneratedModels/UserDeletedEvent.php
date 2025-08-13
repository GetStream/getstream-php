<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserDeletedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $deleteConversationChannels = null,
        public ?bool $hardDelete = null,
        public ?bool $markMessagesDeleted = null,
        public ?string $type = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'delete_conversation_channels' => $this->deleteConversationChannels,
            'hard_delete' => $this->hardDelete,
            'mark_messages_deleted' => $this->markMessagesDeleted,
            'type' => $this->type,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            deleteConversationChannels: $json['delete_conversation_channels'] ?? null,
            hardDelete: $json['hard_delete'] ?? null,
            markMessagesDeleted: $json['mark_messages_deleted'] ?? null,
            type: $json['type'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
