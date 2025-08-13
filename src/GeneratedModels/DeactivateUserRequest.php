<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeactivateUserRequest implements JsonSerializable
{
    public function __construct(public ?string $createdByID = null,
        public ?bool $markMessagesDeleted = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_by_id' => $this->createdByID,
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
        
        return new static(createdByID: $json['created_by_id'] ?? null,
            markMessagesDeleted: $json['mark_messages_deleted'] ?? null
        );
    }
} 
