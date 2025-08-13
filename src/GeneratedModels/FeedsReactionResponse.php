<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedsReactionResponse implements JsonSerializable
{
    public function __construct(public ?string $activityID = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?UserResponse $user = null,
        public ?string $commentID = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'activity_id' => $this->activityID,
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'user' => $this->user,
            'comment_id' => $this->commentID,
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
        
        return new static(activityID: $json['activity_id'] ?? null,
            createdAt: $json['created_at'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            user: $json['user'] ?? null,
            commentID: $json['comment_id'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
