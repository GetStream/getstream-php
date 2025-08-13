<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AggregatedActivityResponse implements JsonSerializable
{
    public function __construct(public ?int $activityCount = null,
        public ?\DateTime $createdAt = null,
        public ?string $group = null,
        public ?int $score = null,
        public ?\DateTime $updatedAt = null,
        public ?int $userCount = null,
        public ?array $activities = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'activity_count' => $this->activityCount,
            'created_at' => $this->createdAt,
            'group' => $this->group,
            'score' => $this->score,
            'updated_at' => $this->updatedAt,
            'user_count' => $this->userCount,
            'activities' => $this->activities,
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
        
        return new static(activityCount: $json['activity_count'] ?? null,
            createdAt: $json['created_at'] ?? null,
            group: $json['group'] ?? null,
            score: $json['score'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            userCount: $json['user_count'] ?? null,
            activities: $json['activities'] ?? null
        );
    }
} 
