<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReadStateResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $lastRead = null,
        public ?int $unreadMessages = null,
        public ?UserResponse $user = null,
        public ?string $lastReadMessageID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'last_read' => $this->lastRead,
            'unread_messages' => $this->unreadMessages,
            'user' => $this->user,
            'last_read_message_id' => $this->lastReadMessageID,
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
            unreadMessages: $json['unread_messages'] ?? null,
            user: $json['user'] ?? null,
            lastReadMessageID: $json['last_read_message_id'] ?? null
        );
    }
} 
