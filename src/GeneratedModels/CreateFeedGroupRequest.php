<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreateFeedGroupRequest implements JsonSerializable
{
    public function __construct(public ?string $id = null,
        public ?string $defaultVisibility = null,
        public ?array $activityProcessors = null,
        public ?array $activitySelectors = null,
        public ?AggregationConfig $aggregation = null,
        public ?object $custom = null,
        public ?NotificationConfig $notification = null,
        public ?RankingConfig $ranking = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'id' => $this->id,
            'default_visibility' => $this->defaultVisibility,
            'activity_processors' => $this->activityProcessors,
            'activity_selectors' => $this->activitySelectors,
            'aggregation' => $this->aggregation,
            'custom' => $this->custom,
            'notification' => $this->notification,
            'ranking' => $this->ranking,
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
        
        return new static(id: $json['id'] ?? null,
            defaultVisibility: $json['default_visibility'] ?? null,
            activityProcessors: $json['activity_processors'] ?? null,
            activitySelectors: $json['activity_selectors'] ?? null,
            aggregation: $json['aggregation'] ?? null,
            custom: $json['custom'] ?? null,
            notification: $json['notification'] ?? null,
            ranking: $json['ranking'] ?? null
        );
    }
} 
