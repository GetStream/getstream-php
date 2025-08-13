<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Policy implements JsonSerializable
{
    public function __construct(public ?int $action = null,
        public ?\DateTime $createdAt = null,
        public ?string $name = null,
        public ?bool $owner = null,
        public ?int $priority = null,
        public ?\DateTime $updatedAt = null,
        public ?array $resources = null,
        public ?array $roles = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'created_at' => $this->createdAt,
            'name' => $this->name,
            'owner' => $this->owner,
            'priority' => $this->priority,
            'updated_at' => $this->updatedAt,
            'resources' => $this->resources,
            'roles' => $this->roles,
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
            createdAt: $json['created_at'] ?? null,
            name: $json['name'] ?? null,
            owner: $json['owner'] ?? null,
            priority: $json['priority'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            resources: $json['resources'] ?? null,
            roles: $json['roles'] ?? null
        );
    }
} 
