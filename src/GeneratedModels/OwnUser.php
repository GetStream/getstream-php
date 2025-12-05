<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $banned
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $language
 * @property bool $online
 * @property string $role
 * @property int $totalUnreadCount
 * @property int $unreadChannels
 * @property int $unreadCount
 * @property int $unreadThreads
 * @property \DateTime $updatedAt
 * @property array<ChannelMute> $channelMutes
 * @property array<Device> $devices
 * @property array<UserMute> $mutes
 * @property object $custom
 * @property array $totalUnreadCountByTeam
 * @property int|null $avgResponseTime
 * @property \DateTime|null $deactivatedAt
 * @property \DateTime|null $deletedAt
 * @property bool|null $invisible
 * @property \DateTime|null $lastActive
 * @property \DateTime|null $lastEngagedAt
 * @property array|null $blockedUserIds
 * @property array|null $latestHiddenChannels
 * @property array|null $teams
 * @property PrivacySettings|null $privacySettings
 * @property PushPreferences|null $pushPreferences
 * @property array|null $teamsRole
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
        /** @var array<ChannelMute>|null */
        #[ArrayOf(ChannelMute::class)]
        public ?array $channelMutes = null,
        /** @var array<Device>|null */
        #[ArrayOf(Device::class)]
        public ?array $devices = null,
        /** @var array<UserMute>|null */
        #[ArrayOf(UserMute::class)]
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
