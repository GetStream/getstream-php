<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class OwnUserResponse extends BaseModel
{
    public function __construct(
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?PushPreferencesResponse $pushPreferences = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $image = null,
        public ?object $custom = null,
        public ?string $language = null,
        public ?string $role = null,
        public ?array $teams = null,
        public ?array $teamsRole = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $banned = null,
        public ?bool $online = null,
        public ?\DateTime $lastActive = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?\DateTime $deactivatedAt = null,
        public ?int $avgResponseTime = null,
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null,
        public ?bool $invisible = null,
        /** @var array<UserMuteResponse>|null */
        #[ArrayOf(UserMuteResponse::class)]
        public ?array $mutes = null,
        /** @var array<ChannelMute>|null */
        #[ArrayOf(ChannelMute::class)]
        public ?array $channelMutes = null,
        public ?int $unreadCount = null,
        public ?int $totalUnreadCount = null,
        public ?array $totalUnreadCountByTeam = null,
        public ?int $unreadChannels = null,
        public ?int $unreadThreads = null,
        public ?array $latestHiddenChannels = null,
        public ?array $blockedUserIds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
