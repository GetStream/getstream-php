<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationFlagResponse implements JsonSerializable
{
    public function __construct(public ?string $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?string $updatedAt = null,
        public ?string $entityCreatorID = null,
        public ?string $reason = null,
        public ?string $reviewQueueItemID = null,
        public ?array $labels = null,
        public ?array $result = null,
        public ?object $custom = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'id' => $this->id,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'entity_creator_id' => $this->entityCreatorID,
            'reason' => $this->reason,
            'review_queue_item_id' => $this->reviewQueueItemID,
            'labels' => $this->labels,
            'result' => $this->result,
            'custom' => $this->custom,
            'moderation_payload' => $this->moderationPayload,
            'review_queue_item' => $this->reviewQueueItem,
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
            entityID: $json['entity_id'] ?? null,
            entityType: $json['entity_type'] ?? null,
            id: $json['id'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            entityCreatorID: $json['entity_creator_id'] ?? null,
            reason: $json['reason'] ?? null,
            reviewQueueItemID: $json['review_queue_item_id'] ?? null,
            labels: $json['labels'] ?? null,
            result: $json['result'] ?? null,
            custom: $json['custom'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            reviewQueueItem: $json['review_queue_item'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
