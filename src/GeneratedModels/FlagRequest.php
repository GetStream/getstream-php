<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagRequest implements JsonSerializable
{
    public function __construct(public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $entityCreatorID = null,
        public ?string $reason = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'entity_creator_id' => $this->entityCreatorID,
            'reason' => $this->reason,
            'user_id' => $this->userID,
            'custom' => $this->custom,
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
            entityCreatorID: $json['entity_creator_id'] ?? null,
            reason: $json['reason'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
