<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AsyncExportErrorEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $error = null,
        public ?\DateTime $finishedAt = null,
        public ?\DateTime $startedAt = null,
        public ?string $taskID = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'error' => $this->error,
            'finished_at' => $this->finishedAt,
            'started_at' => $this->startedAt,
            'task_id' => $this->taskID,
            'custom' => $this->custom,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
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
            error: $json['error'] ?? null,
            finishedAt: $json['finished_at'] ?? null,
            startedAt: $json['started_at'] ?? null,
            taskID: $json['task_id'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null
        );
    }
} 
