<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushTemplate implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $enablePush = null,
        public ?string $eventType = null,
        public ?\DateTime $updatedAt = null,
        public ?string $template = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'enable_push' => $this->enablePush,
            'event_type' => $this->eventType,
            'updated_at' => $this->updatedAt,
            'template' => $this->template,
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
            enablePush: $json['enable_push'] ?? null,
            eventType: $json['event_type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            template: $json['template'] ?? null
        );
    }
} 
