<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class OwnUser implements JsonSerializable
{
    public function __construct(public ?bool $banned = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $language = null,
        public ?bool $online = null,
        public ?string $role = null,
        public ?int $totalUnreadCount = null,
        public ?int $unreadChannels = null,
        public ?int $unreadCount = null,
        public ?int $unreadThreads = null,
        public ?\DateTime $updatedAt = null,
        public ?array $channelMutes = null,
        public ?array $devices = null,
        public ?array $mutes = null,
        public ?object $custom = null,
        public ?array $totalUnreadCountByTeam = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $invisible = null,
        public ?\DateTime $lastActive = null,
        public ?\DateTime $lastEngagedAt = null,
        public ?array $blockedUserIds = null,
        public ?array $latestHiddenChannels = null,
        public ?array $teams = null,
        public ?PrivacySettings $privacySettings = null,
        public ?PushPreferences $pushPreferences = null,
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
            'total_unread_count' => $this->totalUnreadCount,
            'unread_channels' => $this->unreadChannels,
            'unread_count' => $this->unreadCount,
            'unread_threads' => $this->unreadThreads,
            'updated_at' => $this->updatedAt,
            'channel_mutes' => $this->channelMutes,
            'devices' => $this->devices,
            'mutes' => $this->mutes,
            'custom' => $this->custom,
            'total_unread_count_by_team' => $this->totalUnreadCountByTeam,
            'avg_response_time' => $this->avgResponseTime,
            'deactivated_at' => $this->deactivatedAt,
            'deleted_at' => $this->deletedAt,
            'invisible' => $this->invisible,
            'last_active' => $this->lastActive,
            'last_engaged_at' => $this->lastEngagedAt,
            'blocked_user_ids' => $this->blockedUserIds,
            'latest_hidden_channels' => $this->latestHiddenChannels,
            'teams' => $this->teams,
            'privacy_settings' => $this->privacySettings,
            'push_preferences' => $this->pushPreferences,
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
            totalUnreadCount: $json['total_unread_count'] ?? null,
            unreadChannels: $json['unread_channels'] ?? null,
            unreadCount: $json['unread_count'] ?? null,
            unreadThreads: $json['unread_threads'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            channelMutes: $json['channel_mutes'] ?? null,
            devices: $json['devices'] ?? null,
            mutes: $json['mutes'] ?? null,
            custom: $json['custom'] ?? null,
            totalUnreadCountByTeam: $json['total_unread_count_by_team'] ?? null,
            avgResponseTime: $json['avg_response_time'] ?? null,
            deactivatedAt: $json['deactivated_at'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            invisible: $json['invisible'] ?? null,
            lastActive: $json['last_active'] ?? null,
            lastEngagedAt: $json['last_engaged_at'] ?? null,
            blockedUserIds: $json['blocked_user_ids'] ?? null,
            latestHiddenChannels: $json['latest_hidden_channels'] ?? null,
            teams: $json['teams'] ?? null,
            privacySettings: $json['privacy_settings'] ?? null,
            pushPreferences: $json['push_preferences'] ?? null,
            teamsRole: $json['teams_role'] ?? null
        );
    }
} 
