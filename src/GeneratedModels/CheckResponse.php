<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $recommendedAction = null,
        public ?string $status = null,
        public ?string $taskID = null,
        public ?ReviewQueueItemResponse $item = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'recommended_action' => $this->recommendedAction,
            'status' => $this->status,
            'task_id' => $this->taskID,
            'item' => $this->item,
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
        
        return new static(duration: $json['duration'] ?? null,
            recommendedAction: $json['recommended_action'] ?? null,
            status: $json['status'] ?? null,
            taskID: $json['task_id'] ?? null,
            item: $json['item'] ?? null
        );
    }
} 
