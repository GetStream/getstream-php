<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Create a new command
 */
class CreateCommandRequest implements JsonSerializable
{
    public function __construct(public ?string $description = null,
        public ?string $name = null,
        public ?string $args = null,
        public ?string $set = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'description' => $this->description,
            'name' => $this->name,
            'args' => $this->args,
            'set' => $this->set,
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
        
        return new static(description: $json['description'] ?? null,
            name: $json['name'] ?? null,
            args: $json['args'] ?? null,
            set: $json['set'] ?? null
        );
    }
} 
