<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivitySelectorConfig implements JsonSerializable
{
    public function __construct(public ?\DateTime $cutoffTime = null,
        public ?int $minPopularity = null,
        public ?string $type = null,
        public ?array $sort = null,
        public ?object $filter = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cutoff_time' => $this->cutoffTime,
            'min_popularity' => $this->minPopularity,
            'type' => $this->type,
            'sort' => $this->sort,
            'filter' => $this->filter,
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
        
        return new static(cutoffTime: $json['cutoff_time'] ?? null,
            minPopularity: $json['min_popularity'] ?? null,
            type: $json['type'] ?? null,
            sort: $json['sort'] ?? null,
            filter: $json['filter'] ?? null
        );
    }
} 
