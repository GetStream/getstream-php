<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryFeedModerationTemplate implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $name = null,
        public ?\DateTime $updatedAt = null,
        public ?FeedsModerationTemplateConfig $config = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'name' => $this->name,
            'updated_at' => $this->updatedAt,
            'config' => $this->config,
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
            name: $json['name'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            config: $json['config'] ?? null
        );
    }
} 
