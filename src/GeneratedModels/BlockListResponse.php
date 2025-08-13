<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Block list contains restricted words
 */
class BlockListResponse implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?string $type = null,
        public ?array $words = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $team = null,
        public ?\DateTime $updatedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type,
            'words' => $this->words,
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'team' => $this->team,
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
        
        return new static(name: $json['name'] ?? null,
            type: $json['type'] ?? null,
            words: $json['words'] ?? null,
            createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            team: $json['team'] ?? null,
            updatedAt: $json['updated_at'] ?? null
        );
    }
} 
