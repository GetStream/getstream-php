<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EntityCreator implements JsonSerializable
{
    public function __construct(public ?int $banCount = null,
        public ?bool $banned = null,
        public ?int $deletedContentCount = null,
        public ?string $id = null,
        public ?bool $online = null,
        public ?string $role = null,
        public ?object $custom = null,
        public ?array $teamsRole = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $banExpires = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?\DateTime $lastActive = null,
        public ?\DateTime $lastEngagedAt = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?\DateTime $updatedAt = null,
        public ?array $teams = null,
        public ?PrivacySettings $privacySettings = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'ban_count' => $this->banCount,
            'banned' => $this->banned,
            'deleted_content_count' => $this->deletedContentCount,
            'id' => $this->id,
            'online' => $this->online,
            'role' => $this->role,
            'custom' => $this->custom,
            'teams_role' => $this->teamsRole,
            'avg_response_time' => $this->avgResponseTime,
            'ban_expires' => $this->banExpires,
            'created_at' => $this->createdAt,
            'deactivated_at' => $this->deactivatedAt,
            'deleted_at' => $this->deletedAt,
            'invisible' => $this->invisible,
            'language' => $this->language,
            'last_active' => $this->lastActive,
            'last_engaged_at' => $this->lastEngagedAt,
            'revoke_tokens_issued_before' => $this->revokeTokensIssuedBefore,
            'updated_at' => $this->updatedAt,
            'teams' => $this->teams,
            'privacy_settings' => $this->privacySettings,
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
        
        return new static(banCount: $json['ban_count'] ?? null,
            banned: $json['banned'] ?? null,
            deletedContentCount: $json['deleted_content_count'] ?? null,
            id: $json['id'] ?? null,
            online: $json['online'] ?? null,
            role: $json['role'] ?? null,
            custom: $json['custom'] ?? null,
            teamsRole: $json['teams_role'] ?? null,
            avgResponseTime: $json['avg_response_time'] ?? null,
            banExpires: $json['ban_expires'] ?? null,
            createdAt: $json['created_at'] ?? null,
            deactivatedAt: $json['deactivated_at'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            invisible: $json['invisible'] ?? null,
            language: $json['language'] ?? null,
            lastActive: $json['last_active'] ?? null,
            lastEngagedAt: $json['last_engaged_at'] ?? null,
            revokeTokensIssuedBefore: $json['revoke_tokens_issued_before'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            teams: $json['teams'] ?? null,
            privacySettings: $json['privacy_settings'] ?? null
        );
    }
} 
