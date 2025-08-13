<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CustomCheckRequest implements JsonSerializable
{
    public function __construct(public ?string $entityID = null,
        public ?string $entityType = null,
        public ?array $flags = null,
        public ?string $entityCreatorID = null,
        public ?string $userID = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'flags' => $this->flags,
            'entity_creator_id' => $this->entityCreatorID,
            'user_id' => $this->userID,
            'moderation_payload' => $this->moderationPayload,
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
        
        return new static(entityID: $json['entity_id'] ?? null,
            entityType: $json['entity_type'] ?? null,
            flags: $json['flags'] ?? null,
            entityCreatorID: $json['entity_creator_id'] ?? null,
            userID: $json['user_id'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
