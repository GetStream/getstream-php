<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Reactivate users in batches
 */
class ReactivateUsersRequest implements JsonSerializable
{
    public function __construct(public ?array $userIds = null,
        public ?string $createdByID = null,
        public ?bool $restoreChannels = null,
        public ?bool $restoreMessages = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_ids' => $this->userIds,
            'created_by_id' => $this->createdByID,
            'restore_channels' => $this->restoreChannels,
            'restore_messages' => $this->restoreMessages,
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
            restoreChannels: $json['restore_channels'] ?? null,
            restoreMessages: $json['restore_messages'] ?? null
        );
    }
} 
