<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnreadCountsThread implements JsonSerializable
{
    public function __construct(public ?\DateTime $lastRead = null,
        public ?string $lastReadMessageID = null,
        public ?string $parentMessageID = null,
        public ?int $unreadCount = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'last_read' => $this->lastRead,
            'last_read_message_id' => $this->lastReadMessageID,
            'parent_message_id' => $this->parentMessageID,
            'unread_count' => $this->unreadCount,
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
        
        return new static(lastRead: $json['last_read'] ?? null,
            lastReadMessageID: $json['last_read_message_id'] ?? null,
            parentMessageID: $json['parent_message_id'] ?? null,
            unreadCount: $json['unread_count'] ?? null
        );
    }
} 
