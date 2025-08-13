<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkActivityRequest implements JsonSerializable
{
    public function __construct(public ?bool $markAllRead = null,
        public ?bool $markAllSeen = null,
        public ?string $userID = null,
        public ?array $markRead = null,
        public ?array $markSeen = null,
        public ?array $markWatched = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'mark_all_read' => $this->markAllRead,
            'mark_all_seen' => $this->markAllSeen,
            'user_id' => $this->userID,
            'mark_read' => $this->markRead,
            'mark_seen' => $this->markSeen,
            'mark_watched' => $this->markWatched,
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
        
        return new static(markAllRead: $json['mark_all_read'] ?? null,
            markAllSeen: $json['mark_all_seen'] ?? null,
            userID: $json['user_id'] ?? null,
            markRead: $json['mark_read'] ?? null,
            markSeen: $json['mark_seen'] ?? null,
            markWatched: $json['mark_watched'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
