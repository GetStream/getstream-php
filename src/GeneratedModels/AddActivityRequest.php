<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddActivityRequest implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?array $feeds = null,
        public ?string $expiresAt = null,
        public ?string $id = null,
        public ?string $parentID = null,
        public ?string $pollID = null,
        public ?string $text = null,
        public ?string $userID = null,
        public ?string $visibility = null,
        public ?string $visibilityTag = null,
        public ?array $attachments = null,
        public ?array $filterTags = null,
        public ?array $interestTags = null,
        public ?array $mentionedUserIds = null,
        public ?object $custom = null,
        public ?ActivityLocation $location = null,
        public ?object $searchData = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'fids' => $this->feeds,
            'expires_at' => $this->expiresAt,
            'id' => $this->id,
            'parent_id' => $this->parentID,
            'poll_id' => $this->pollID,
            'text' => $this->text,
            'user_id' => $this->userID,
            'visibility' => $this->visibility,
            'visibility_tag' => $this->visibilityTag,
            'attachments' => $this->attachments,
            'filter_tags' => $this->filterTags,
            'interest_tags' => $this->interestTags,
            'mentioned_user_ids' => $this->mentionedUserIds,
            'custom' => $this->custom,
            'location' => $this->location,
            'search_data' => $this->searchData,
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
        
        return new static(type: $json['type'] ?? null,
            feeds: $json['fids'] ?? null,
            expiresAt: $json['expires_at'] ?? null,
            id: $json['id'] ?? null,
            parentID: $json['parent_id'] ?? null,
            pollID: $json['poll_id'] ?? null,
            text: $json['text'] ?? null,
            userID: $json['user_id'] ?? null,
            visibility: $json['visibility'] ?? null,
            visibilityTag: $json['visibility_tag'] ?? null,
            attachments: $json['attachments'] ?? null,
            filterTags: $json['filter_tags'] ?? null,
            interestTags: $json['interest_tags'] ?? null,
            mentionedUserIds: $json['mentioned_user_ids'] ?? null,
            custom: $json['custom'] ?? null,
            location: $json['location'] ?? null,
            searchData: $json['search_data'] ?? null
        );
    }
} 
