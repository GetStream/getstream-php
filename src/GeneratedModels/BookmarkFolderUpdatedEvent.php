<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a bookmark folder is updated.
 */
class BookmarkFolderUpdatedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?BookmarkFolderResponse $bookmarkFolder = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'bookmark_folder' => $this->bookmarkFolder,
            'custom' => $this->custom,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
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
            bookmarkFolder: $json['bookmark_folder'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
