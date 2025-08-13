<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserResponseCommonFields implements JsonSerializable
{
    public function __construct(public ?bool $banned = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $language = null,
        public ?bool $online = null,
        public ?string $role = null,
        public ?\DateTime $updatedAt = null,
        public ?array $blockedUserIds = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?string $image = null,
        public ?\DateTime $lastActive = null,
        public ?string $name = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?array $teamsRole = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'banned' => $this->banned,
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'language' => $this->language,
            'online' => $this->online,
            'role' => $this->role,
            'updated_at' => $this->updatedAt,
            'blocked_user_ids' => $this->blockedUserIds,
            'teams' => $this->teams,
            'custom' => $this->custom,
            'avg_response_time' => $this->avgResponseTime,
            'deactivated_at' => $this->deactivatedAt,
            'deleted_at' => $this->deletedAt,
            'image' => $this->image,
            'last_active' => $this->lastActive,
            'name' => $this->name,
            'revoke_tokens_issued_before' => $this->revokeTokensIssuedBefore,
            'teams_role' => $this->teamsRole,
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
            createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            language: $json['language'] ?? null,
            online: $json['online'] ?? null,
            role: $json['role'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            blockedUserIds: $json['blocked_user_ids'] ?? null,
            teams: $json['teams'] ?? null,
            custom: $json['custom'] ?? null,
            avgResponseTime: $json['avg_response_time'] ?? null,
            deactivatedAt: $json['deactivated_at'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            image: $json['image'] ?? null,
            lastActive: $json['last_active'] ?? null,
            name: $json['name'] ?? null,
            revokeTokensIssuedBefore: $json['revoke_tokens_issued_before'] ?? null,
            teamsRole: $json['teams_role'] ?? null
        );
    }
} 
