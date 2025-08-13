<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelInput implements JsonSerializable
{
    public function __construct(public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
        public ?string $createdByID = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $team = null,
        public ?string $truncatedByID = null,
        public ?array $invites = null,
        public ?array $members = null,
        public ?ChannelConfig $configOverrides = null,
        public ?UserRequest $createdBy = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'auto_translation_enabled' => $this->autoTranslationEnabled,
            'auto_translation_language' => $this->autoTranslationLanguage,
            'created_by_id' => $this->createdByID,
            'disabled' => $this->disabled,
            'frozen' => $this->frozen,
            'team' => $this->team,
            'truncated_by_id' => $this->truncatedByID,
            'invites' => $this->invites,
            'members' => $this->members,
            'config_overrides' => $this->configOverrides,
            'created_by' => $this->createdBy,
            'custom' => $this->custom,
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
        
        return new static(autoTranslationEnabled: $json['auto_translation_enabled'] ?? null,
            autoTranslationLanguage: $json['auto_translation_language'] ?? null,
            createdByID: $json['created_by_id'] ?? null,
            disabled: $json['disabled'] ?? null,
            frozen: $json['frozen'] ?? null,
            team: $json['team'] ?? null,
            truncatedByID: $json['truncated_by_id'] ?? null,
            invites: $json['invites'] ?? null,
            members: $json['members'] ?? null,
            configOverrides: $json['config_overrides'] ?? null,
            createdBy: $json['created_by'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
