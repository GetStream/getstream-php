<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Channel implements JsonSerializable
{
    public function __construct(public ?string $autoTranslationLanguage = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?bool $autoTranslationEnabled = null,
        public ?int $cooldown = null,
        public ?\DateTime $deletedAt = null,
        public ?string $lastCampaigns = null,
        public ?\DateTime $lastMessageAt = null,
        public ?int $memberCount = null,
        public ?string $team = null,
        public ?array $activeLiveLocations = null,
        public ?array $invites = null,
        public ?array $members = null,
        public ?ChannelConfig $config = null,
        public ?ConfigOverrides $configOverrides = null,
        public ?User $createdBy = null,
        public ?User $truncatedBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'auto_translation_language' => $this->autoTranslationLanguage,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'disabled' => $this->disabled,
            'frozen' => $this->frozen,
            'id' => $this->id,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'custom' => $this->custom,
            'auto_translation_enabled' => $this->autoTranslationEnabled,
            'cooldown' => $this->cooldown,
            'deleted_at' => $this->deletedAt,
            'last_campaigns' => $this->lastCampaigns,
            'last_message_at' => $this->lastMessageAt,
            'member_count' => $this->memberCount,
            'team' => $this->team,
            'active_live_locations' => $this->activeLiveLocations,
            'invites' => $this->invites,
            'members' => $this->members,
            'config' => $this->config,
            'config_overrides' => $this->configOverrides,
            'created_by' => $this->createdBy,
            'truncated_by' => $this->truncatedBy,
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
        
        return new static(autoTranslationLanguage: $json['auto_translation_language'] ?? null,
            cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            disabled: $json['disabled'] ?? null,
            frozen: $json['frozen'] ?? null,
            id: $json['id'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            custom: $json['custom'] ?? null,
            autoTranslationEnabled: $json['auto_translation_enabled'] ?? null,
            cooldown: $json['cooldown'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            lastCampaigns: $json['last_campaigns'] ?? null,
            lastMessageAt: $json['last_message_at'] ?? null,
            memberCount: $json['member_count'] ?? null,
            team: $json['team'] ?? null,
            activeLiveLocations: $json['active_live_locations'] ?? null,
            invites: $json['invites'] ?? null,
            members: $json['members'] ?? null,
            config: $json['config'] ?? null,
            configOverrides: $json['config_overrides'] ?? null,
            createdBy: $json['created_by'] ?? null,
            truncatedBy: $json['truncated_by'] ?? null
        );
    }
} 
