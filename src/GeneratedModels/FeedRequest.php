<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedRequest implements JsonSerializable
{
    public function __construct(public ?string $feedGroupID = null,
        public ?string $feedID = null,
        public ?string $createdByID = null,
        public ?string $description = null,
        public ?string $name = null,
        public ?string $visibility = null,
        public ?array $filterTags = null,
        public ?array $members = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'feed_group_id' => $this->feedGroupID,
            'feed_id' => $this->feedID,
            'created_by_id' => $this->createdByID,
            'description' => $this->description,
            'name' => $this->name,
            'visibility' => $this->visibility,
            'filter_tags' => $this->filterTags,
            'members' => $this->members,
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
        
        return new static(feedGroupID: $json['feed_group_id'] ?? null,
            feedID: $json['feed_id'] ?? null,
            createdByID: $json['created_by_id'] ?? null,
            description: $json['description'] ?? null,
            name: $json['name'] ?? null,
            visibility: $json['visibility'] ?? null,
            filterTags: $json['filter_tags'] ?? null,
            members: $json['members'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
