<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EnrichedReaction implements JsonSerializable
{
    public function __construct(public ?string $activityID = null,
        public ?string $kind = null,
        public ?string $userID = null,
        public ?string $id = null,
        public ?string $parent = null,
        public ?array $targetFeeds = null,
        public ?array $childrenCounts = null,
        public ?Time $createdAt = null,
        public ?object $data = null,
        public ?array $latestChildren = null,
        public ?array $ownChildren = null,
        public ?Time $updatedAt = null,
        public ?Data $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'activity_id' => $this->activityID,
            'kind' => $this->kind,
            'user_id' => $this->userID,
            'id' => $this->id,
            'parent' => $this->parent,
            'target_feeds' => $this->targetFeeds,
            'children_counts' => $this->childrenCounts,
            'created_at' => $this->createdAt,
            'data' => $this->data,
            'latest_children' => $this->latestChildren,
            'own_children' => $this->ownChildren,
            'updated_at' => $this->updatedAt,
            'user' => $this->user,
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
        
        return new static(activityID: $json['activity_id'] ?? null,
            kind: $json['kind'] ?? null,
            userID: $json['user_id'] ?? null,
            id: $json['id'] ?? null,
            parent: $json['parent'] ?? null,
            targetFeeds: $json['target_feeds'] ?? null,
            childrenCounts: $json['children_counts'] ?? null,
            createdAt: $json['created_at'] ?? null,
            data: $json['data'] ?? null,
            latestChildren: $json['latest_children'] ?? null,
            ownChildren: $json['own_children'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
