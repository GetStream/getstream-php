<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class OwnUser extends BaseModel
{
    public function __construct(
        public ?bool $banned = null,
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
        public ?array $teamsRole = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
