<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryReviewQueueResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $items = null,
        public ?array $actionConfig = null,
        public ?object $stats = null,
        public ?string $next = null,
        public ?string $prev = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'items' => $this->items,
            'action_config' => $this->actionConfig,
            'stats' => $this->stats,
            'next' => $this->next,
            'prev' => $this->prev,
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
            items: $json['items'] ?? null,
            actionConfig: $json['action_config'] ?? null,
            stats: $json['stats'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null
        );
    }
} 
