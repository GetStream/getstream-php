<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckRequest implements JsonSerializable
{
    public function __construct(public ?string $configKey = null,
        public ?string $entityCreatorID = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $configTeam = null,
        public ?bool $testMode = null,
        public ?string $userID = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?object $options = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'config_key' => $this->configKey,
            'entity_creator_id' => $this->entityCreatorID,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'config_team' => $this->configTeam,
            'test_mode' => $this->testMode,
            'user_id' => $this->userID,
            'moderation_payload' => $this->moderationPayload,
            'options' => $this->options,
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
        
        return new static(configKey: $json['config_key'] ?? null,
            entityCreatorID: $json['entity_creator_id'] ?? null,
            entityID: $json['entity_id'] ?? null,
            entityType: $json['entity_type'] ?? null,
            configTeam: $json['config_team'] ?? null,
            testMode: $json['test_mode'] ?? null,
            userID: $json['user_id'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            options: $json['options'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
