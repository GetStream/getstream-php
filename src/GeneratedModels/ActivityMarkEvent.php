<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when activities are marked as read, seen, or watched.
 */
class ActivityMarkEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $fid = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?string $feedVisibility = null,
        public ?bool $markAllRead = null,
        public ?bool $markAllSeen = null,
        public ?\DateTime $receivedAt = null,
        public ?array $markRead = null,
        public ?array $markSeen = null,
        public ?array $markWatched = null,
        public ?UserResponseCommonFields $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'fid' => $this->fid,
            'custom' => $this->custom,
            'type' => $this->type,
            'feed_visibility' => $this->feedVisibility,
            'mark_all_read' => $this->markAllRead,
            'mark_all_seen' => $this->markAllSeen,
            'received_at' => $this->receivedAt,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            fid: $json['fid'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            feedVisibility: $json['feed_visibility'] ?? null,
            markAllRead: $json['mark_all_read'] ?? null,
            markAllSeen: $json['mark_all_seen'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            markRead: $json['mark_read'] ?? null,
            markSeen: $json['mark_seen'] ?? null,
            markWatched: $json['mark_watched'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
