<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetTaskResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $duration = null,
        public ?string $status = null,
        public ?string $taskID = null,
        public ?\DateTime $updatedAt = null,
        public ?ErrorResult $error = null,
        public ?object $result = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'duration' => $this->duration,
            'status' => $this->status,
            'task_id' => $this->taskID,
            'updated_at' => $this->updatedAt,
            'error' => $this->error,
            'result' => $this->result,
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
            duration: $json['duration'] ?? null,
            status: $json['status'] ?? null,
            taskID: $json['task_id'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            error: $json['error'] ?? null,
            result: $json['result'] ?? null
        );
    }
} 
