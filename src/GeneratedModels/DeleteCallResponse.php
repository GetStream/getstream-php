<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * DeleteCallResponse is the payload for deleting a call.
 */
class DeleteCallResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?CallResponse $call = null,
        public ?string $taskID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'call' => $this->call,
            'task_id' => $this->taskID,
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
            call: $json['call'] ?? null,
            taskID: $json['task_id'] ?? null
        );
    }
} 
