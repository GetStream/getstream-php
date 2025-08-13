<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Permission implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?bool $custom = null,
        public ?string $description = null,
        public ?string $id = null,
        public ?string $level = null,
        public ?string $name = null,
        public ?bool $owner = null,
        public ?bool $sameTeam = null,
        public ?array $tags = null,
        public ?object $condition = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'custom' => $this->custom,
            'description' => $this->description,
            'id' => $this->id,
            'level' => $this->level,
            'name' => $this->name,
            'owner' => $this->owner,
            'same_team' => $this->sameTeam,
            'tags' => $this->tags,
            'condition' => $this->condition,
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
        
        return new static(action: $json['action'] ?? null,
            custom: $json['custom'] ?? null,
            description: $json['description'] ?? null,
            id: $json['id'] ?? null,
            level: $json['level'] ?? null,
            name: $json['name'] ?? null,
            owner: $json['owner'] ?? null,
            sameTeam: $json['same_team'] ?? null,
            tags: $json['tags'] ?? null,
            condition: $json['condition'] ?? null
        );
    }
} 
