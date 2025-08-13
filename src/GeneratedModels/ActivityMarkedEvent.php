<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivityMarkedEvent implements JsonSerializable
{
    public function __construct(public ?bool $allRead = null,
        public ?bool $allSeen = null,
        public ?\DateTime $createdAt = null,
        public ?string $feedID = null,
        public ?string $userID = null,
        public ?string $type = null,
        public ?array $markedRead = null,
        public ?array $markedWatched = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'all_read' => $this->allRead,
            'all_seen' => $this->allSeen,
            'created_at' => $this->createdAt,
            'feed_id' => $this->feedID,
            'user_id' => $this->userID,
            'type' => $this->type,
            'marked_read' => $this->markedRead,
            'marked_watched' => $this->markedWatched,
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
        
        return new static(allRead: $json['all_read'] ?? null,
            allSeen: $json['all_seen'] ?? null,
            createdAt: $json['created_at'] ?? null,
            feedID: $json['feed_id'] ?? null,
            userID: $json['user_id'] ?? null,
            type: $json['type'] ?? null,
            markedRead: $json['marked_read'] ?? null,
            markedWatched: $json['marked_watched'] ?? null
        );
    }
} 
