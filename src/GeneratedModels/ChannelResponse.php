<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents channel in chat
 */
class ChannelResponse implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
        public ?bool $blocked = null,
        public ?int $cooldown = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $hidden = null,
        public ?\DateTime $hideMessagesBefore = null,
        public ?\DateTime $lastMessageAt = null,
        public ?int $memberCount = null,
        public ?\DateTime $muteExpiresAt = null,
        public ?bool $muted = null,
        public ?string $team = null,
        public ?\DateTime $truncatedAt = null,
        public ?array $members = null,
        public ?array $ownCapabilities = null,
        public ?ChannelConfigWithInfo $config = null,
        public ?UserResponse $createdBy = null,
        public ?UserResponse $truncatedBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'disabled' => $this->disabled,
            'frozen' => $this->frozen,
            'id' => $this->id,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'custom' => $this->custom,
            'auto_translation_enabled' => $this->autoTranslationEnabled,
            'auto_translation_language' => $this->autoTranslationLanguage,
            'blocked' => $this->blocked,
            'cooldown' => $this->cooldown,
            'deleted_at' => $this->deletedAt,
            'hidden' => $this->hidden,
            'hide_messages_before' => $this->hideMessagesBefore,
            'last_message_at' => $this->lastMessageAt,
            'member_count' => $this->memberCount,
            'mute_expires_at' => $this->muteExpiresAt,
            'muted' => $this->muted,
            'team' => $this->team,
            'truncated_at' => $this->truncatedAt,
            'members' => $this->members,
            'own_capabilities' => $this->ownCapabilities,
            'config' => $this->config,
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
        
        return new static(cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            disabled: $json['disabled'] ?? null,
            frozen: $json['frozen'] ?? null,
            id: $json['id'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            custom: $json['custom'] ?? null,
            autoTranslationEnabled: $json['auto_translation_enabled'] ?? null,
            autoTranslationLanguage: $json['auto_translation_language'] ?? null,
            blocked: $json['blocked'] ?? null,
            cooldown: $json['cooldown'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            hidden: $json['hidden'] ?? null,
            hideMessagesBefore: $json['hide_messages_before'] ?? null,
            lastMessageAt: $json['last_message_at'] ?? null,
            memberCount: $json['member_count'] ?? null,
            muteExpiresAt: $json['mute_expires_at'] ?? null,
            muted: $json['muted'] ?? null,
            team: $json['team'] ?? null,
            truncatedAt: $json['truncated_at'] ?? null,
            members: $json['members'] ?? null,
            ownCapabilities: $json['own_capabilities'] ?? null,
            config: $json['config'] ?? null,
            createdBy: $json['created_by'] ?? null,
            truncatedBy: $json['truncated_by'] ?? null
        );
    }
} 
