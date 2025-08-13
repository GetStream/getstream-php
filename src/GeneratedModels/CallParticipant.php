<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallParticipant implements JsonSerializable
{
    public function __construct(public ?bool $banned = null,
        public ?string $id = null,
        public ?\DateTime $joinedAt = null,
        public ?bool $online = null,
        public ?string $role = null,
//        public ?string $role = null,
        public ?string $userSessionID = null,
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
            'banned' => $this->banned,
            'id' => $this->id,
            'JoinedAt' => $this->joinedAt,
            'online' => $this->online,
            'Role' => $this->role,
            'role' => $this->role,
            'UserSessionID' => $this->userSessionID,
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
        
        return new static(banned: $json['banned'] ?? null,
            id: $json['id'] ?? null,
            joinedAt: $json['JoinedAt'] ?? null,
            online: $json['online'] ?? null,
            role: $json['Role'] ?? null,
            role: $json['role'] ?? null,
            userSessionID: $json['UserSessionID'] ?? null,
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
