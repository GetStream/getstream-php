<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a reminder becomes due, triggering a notification for the user.
 */
class ReminderNotificationEvent implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?string $parentID = null,
        public ?\DateTime $receivedAt = null,
        public ?ReminderResponseData $reminder = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'message_id' => $this->messageID,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'type' => $this->type,
            'parent_id' => $this->parentID,
            'received_at' => $this->receivedAt,
            'reminder' => $this->reminder,
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
        
        return new static(cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            messageID: $json['message_id'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            parentID: $json['parent_id'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            reminder: $json['reminder'] ?? null
        );
    }
} 
