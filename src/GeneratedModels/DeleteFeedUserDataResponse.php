<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for deleting feed user data
 */
class DeleteFeedUserDataResponse implements JsonSerializable
{
    public function __construct(public ?int $deletedActivities = null,
        public ?int $deletedBookmarks = null,
        public ?int $deletedComments = null,
        public ?int $deletedReactions = null,
        public ?string $duration = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'deleted_activities' => $this->deletedActivities,
            'deleted_bookmarks' => $this->deletedBookmarks,
            'deleted_comments' => $this->deletedComments,
            'deleted_reactions' => $this->deletedReactions,
            'duration' => $this->duration,
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
        
        return new static(deletedActivities: $json['deleted_activities'] ?? null,
            deletedBookmarks: $json['deleted_bookmarks'] ?? null,
            deletedComments: $json['deleted_comments'] ?? null,
            deletedReactions: $json['deleted_reactions'] ?? null,
            duration: $json['duration'] ?? null
        );
    }
} 
