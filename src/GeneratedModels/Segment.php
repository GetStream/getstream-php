<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Segment implements JsonSerializable
{
    public function __construct(public ?bool $allSenderChannels = null,
        public ?bool $allUsers = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?int $size = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?string $description = null,
        public ?string $taskID = null,
        public ?object $filter = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'all_sender_channels' => $this->allSenderChannels,
            'all_users' => $this->allUsers,
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'deleted_at' => $this->deletedAt,
            'description' => $this->description,
            'task_id' => $this->taskID,
            'filter' => $this->filter,
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
        
        return new static(allSenderChannels: $json['all_sender_channels'] ?? null,
            allUsers: $json['all_users'] ?? null,
            createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            name: $json['name'] ?? null,
            size: $json['size'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            description: $json['description'] ?? null,
            taskID: $json['task_id'] ?? null,
            filter: $json['filter'] ?? null
        );
    }
} 
