<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnreadCountsChannel implements JsonSerializable
{
    public function __construct(public ?string $channelID = null,
        public ?\DateTime $lastRead = null,
        public ?int $unreadCount = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_id' => $this->channelID,
            'last_read' => $this->lastRead,
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
        
        return new static(channelID: $json['channel_id'] ?? null,
            lastRead: $json['last_read'] ?? null,
            unreadCount: $json['unread_count'] ?? null
        );
    }
} 
