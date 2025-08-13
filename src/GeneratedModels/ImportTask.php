<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImportTask implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $mode = null,
        public ?string $path = null,
        public ?string $state = null,
        public ?\DateTime $updatedAt = null,
        public ?array $history = null,
        public ?int $size = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'mode' => $this->mode,
            'path' => $this->path,
            'state' => $this->state,
            'updated_at' => $this->updatedAt,
            'history' => $this->history,
            'size' => $this->size,
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
            id: $json['id'] ?? null,
            mode: $json['mode'] ?? null,
            path: $json['path'] ?? null,
            state: $json['state'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            history: $json['history'] ?? null,
            size: $json['size'] ?? null
        );
    }
} 
