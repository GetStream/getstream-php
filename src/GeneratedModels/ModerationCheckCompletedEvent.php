<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a moderation check is completed
 */
class ModerationCheckCompletedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $recommendedAction = null,
        public ?string $reviewQueueItemID = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'recommended_action' => $this->recommendedAction,
            'review_queue_item_id' => $this->reviewQueueItemID,
            'custom' => $this->custom,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
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
            recommendedAction: $json['recommended_action'] ?? null,
            reviewQueueItemID: $json['review_queue_item_id'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null
        );
    }
} 
