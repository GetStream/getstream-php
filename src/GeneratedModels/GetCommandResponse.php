<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetCommandResponse implements JsonSerializable
{
    public function __construct(public ?string $args = null,
        public ?string $description = null,
        public ?string $duration = null,
        public ?string $name = null,
        public ?string $set = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'args' => $this->args,
            'description' => $this->description,
            'duration' => $this->duration,
            'name' => $this->name,
            'set' => $this->set,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
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
        
        return new static(args: $json['args'] ?? null,
            description: $json['description'] ?? null,
            duration: $json['duration'] ?? null,
            name: $json['name'] ?? null,
            set: $json['set'] ?? null,
            createdAt: $json['created_at'] ?? null,
            updatedAt: $json['updated_at'] ?? null
        );
    }
} 
