<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Deactivate users request
 */
class DeactivateUsersRequest implements JsonSerializable
{
    public function __construct(public ?array $userIds = null,
        public ?string $createdByID = null,
        public ?bool $markChannelsDeleted = null,
        public ?bool $markMessagesDeleted = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_ids' => $this->userIds,
            'created_by_id' => $this->createdByID,
            'mark_channels_deleted' => $this->markChannelsDeleted,
            'mark_messages_deleted' => $this->markMessagesDeleted,
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
        
        return new static(userIds: $json['user_ids'] ?? null,
            createdByID: $json['created_by_id'] ?? null,
            markChannelsDeleted: $json['mark_channels_deleted'] ?? null,
            markMessagesDeleted: $json['mark_messages_deleted'] ?? null
        );
    }
} 
