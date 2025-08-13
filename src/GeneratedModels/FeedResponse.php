<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $description = null,
        public ?string $feed = null,
        public ?int $followerCount = null,
        public ?int $followingCount = null,
        public ?string $groupID = null,
        public ?string $id = null,
        public ?int $memberCount = null,
        public ?string $name = null,
        public ?int $pinCount = null,
        public ?\DateTime $updatedAt = null,
        public ?UserResponse $createdBy = null,
        public ?\DateTime $deletedAt = null,
        public ?string $visibility = null,
        public ?array $filterTags = null,
        public ?array $ownFollows = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'description' => $this->description,
            'feed' => $this->feed,
            'follower_count' => $this->followerCount,
            'following_count' => $this->followingCount,
            'group_id' => $this->groupID,
            'id' => $this->id,
            'member_count' => $this->memberCount,
            'name' => $this->name,
            'pin_count' => $this->pinCount,
            'updated_at' => $this->updatedAt,
            'created_by' => $this->createdBy,
            'deleted_at' => $this->deletedAt,
            'visibility' => $this->visibility,
            'filter_tags' => $this->filterTags,
            'own_follows' => $this->ownFollows,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            description: $json['description'] ?? null,
            feed: $json['feed'] ?? null,
            followerCount: $json['follower_count'] ?? null,
            followingCount: $json['following_count'] ?? null,
            groupID: $json['group_id'] ?? null,
            id: $json['id'] ?? null,
            memberCount: $json['member_count'] ?? null,
            name: $json['name'] ?? null,
            pinCount: $json['pin_count'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            createdBy: $json['created_by'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            visibility: $json['visibility'] ?? null,
            filterTags: $json['filter_tags'] ?? null,
            ownFollows: $json['own_follows'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
