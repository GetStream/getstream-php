<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a moderation review queue item is updated
 */
class ReviewQueueItemUpdatedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?array $flags = null,
        public ?ActionLogResponse $action = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'custom' => $this->custom,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
            'flags' => $this->flags,
            'action' => $this->action,
            'review_queue_item' => $this->reviewQueueItem,
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
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            flags: $json['flags'] ?? null,
            action: $json['action'] ?? null,
            reviewQueueItem: $json['review_queue_item'] ?? null
        );
    }
} 
