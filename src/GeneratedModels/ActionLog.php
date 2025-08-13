<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActionLog implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $reason = null,
        public ?string $reporterType = null,
        public ?string $reviewQueueItemID = null,
        public ?string $targetUserID = null,
        public ?string $type = null,
        public ?object $custom = null,
        public ?ReviewQueueItem $reviewQueueItem = null,
        public ?User $targetUser = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'reason' => $this->reason,
            'reporter_type' => $this->reporterType,
            'review_queue_item_id' => $this->reviewQueueItemID,
            'target_user_id' => $this->targetUserID,
            'type' => $this->type,
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
            reporterType: $json['reporter_type'] ?? null,
            reviewQueueItemID: $json['review_queue_item_id'] ?? null,
            targetUserID: $json['target_user_id'] ?? null,
            type: $json['type'] ?? null,
            custom: $json['custom'] ?? null,
            reviewQueueItem: $json['review_queue_item'] ?? null,
            targetUser: $json['target_user'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
