<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $banned
 * @property \DateTime $createdAt
 * @property string $id
 * @property bool $invisible
 * @property string $language
 * @property bool $online
 * @property string $role
 * @property int $totalUnreadCount
 * @property int $unreadChannels
 * @property int $unreadCount
 * @property int $unreadThreads
 * @property \DateTime $updatedAt
 * @property array<ChannelMute> $channelMutes
 * @property array<DeviceResponse> $devices
 * @property array<UserMuteResponse> $mutes
 * @property array $teams
 * @property object $custom
 * @property int|null $avgResponseTime
 * @property \DateTime|null $deactivatedAt
 * @property \DateTime|null $deletedAt
 * @property string|null $image
 * @property \DateTime|null $lastActive
 * @property string|null $name
 * @property \DateTime|null $revokeTokensIssuedBefore
 * @property array|null $blockedUserIds
 * @property array|null $latestHiddenChannels
 * @property PrivacySettingsResponse|null $privacySettings
 * @property PushPreferencesResponse|null $pushPreferences
 * @property array|null $teamsRole
 * @property array|null $totalUnreadCountByTeam
 */
class OwnUserResponse extends BaseModel
{
    public function __construct(
        public ?bool $banned = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?bool $invisible = null,
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
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null,
        /** @var array<UserMuteResponse>|null */
        #[ArrayOf(UserMuteResponse::class)]
        public ?array $mutes = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?string $image = null,
        public ?\DateTime $lastActive = null,
        public ?string $name = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?array $blockedUserIds = null,
        public ?array $latestHiddenChannels = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?PushPreferencesResponse $pushPreferences = null,
        public ?array $teamsRole = null,
        public ?array $totalUnreadCountByTeam = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
