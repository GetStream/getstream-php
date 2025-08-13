<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Contains information about flagged user or message
 */
class Flag implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?\DateTime $updatedAt = null,
        public ?array $result = null,
        public ?string $entityCreatorID = null,
        public ?bool $isStreamedContent = null,
        public ?string $moderationPayloadHash = null,
        public ?string $reason = null,
        public ?string $reviewQueueItemID = null,
        public ?string $type = null,
        public ?array $labels = null,
        public ?object $custom = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?ReviewQueueItem $reviewQueueItem = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'updated_at' => $this->updatedAt,
            'result' => $this->result,
            'entity_creator_id' => $this->entityCreatorID,
            'is_streamed_content' => $this->isStreamedContent,
            'moderation_payload_hash' => $this->moderationPayloadHash,
            'reason' => $this->reason,
            'review_queue_item_id' => $this->reviewQueueItemID,
            'type' => $this->type,
            'labels' => $this->labels,
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
            updatedAt: $json['updated_at'] ?? null,
            result: $json['result'] ?? null,
            entityCreatorID: $json['entity_creator_id'] ?? null,
            isStreamedContent: $json['is_streamed_content'] ?? null,
            moderationPayloadHash: $json['moderation_payload_hash'] ?? null,
            reason: $json['reason'] ?? null,
            reviewQueueItemID: $json['review_queue_item_id'] ?? null,
            type: $json['type'] ?? null,
            labels: $json['labels'] ?? null,
            custom: $json['custom'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            reviewQueueItem: $json['review_queue_item'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
