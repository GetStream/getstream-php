<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationActionConfig implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?string $description = null,
        public ?string $entityType = null,
        public ?string $icon = null,
        public ?int $order = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'description' => $this->description,
            'entity_type' => $this->entityType,
            'icon' => $this->icon,
            'order' => $this->order,
            'custom' => $this->custom,
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
            description: $json['description'] ?? null,
            entityType: $json['entity_type'] ?? null,
            icon: $json['icon'] ?? null,
            order: $json['order'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
