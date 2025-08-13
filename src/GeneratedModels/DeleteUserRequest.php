<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteUserRequest implements JsonSerializable
{
    public function __construct(public ?bool $deleteConversationChannels = null,
        public ?bool $deleteFeedsContent = null,
        public ?bool $hardDelete = null,
        public ?bool $markMessagesDeleted = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'delete_conversation_channels' => $this->deleteConversationChannels,
            'delete_feeds_content' => $this->deleteFeedsContent,
            'hard_delete' => $this->hardDelete,
            'mark_messages_deleted' => $this->markMessagesDeleted,
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
        
        return new static(deleteConversationChannels: $json['delete_conversation_channels'] ?? null,
            deleteFeedsContent: $json['delete_feeds_content'] ?? null,
            hardDelete: $json['hard_delete'] ?? null,
            markMessagesDeleted: $json['mark_messages_deleted'] ?? null
        );
    }
} 
