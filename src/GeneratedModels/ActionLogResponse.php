<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActionLogResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $reason = null,
        public ?string $targetUserID = null,
        public ?string $type = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?UserResponse $targetUser = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'reason' => $this->reason,
            'target_user_id' => $this->targetUserID,
            'type' => $this->type,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'review_queue_item' => $this->reviewQueueItem,
            'target_user' => $this->targetUser,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            reason: $json['reason'] ?? null,
            targetUserID: $json['target_user_id'] ?? null,
            type: $json['type'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            reviewQueueItem: $json['review_queue_item'] ?? null,
            targetUser: $json['target_user'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
