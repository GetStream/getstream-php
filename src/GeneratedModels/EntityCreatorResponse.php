<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $banCount
 * @property bool $banned
 * @property \DateTime $createdAt
 * @property int $deletedContentCount
 * @property int $flaggedCount
 * @property string $id
 * @property bool $invisible
 * @property string $language
 * @property bool $online
 * @property string $role
 * @property bool $shadowBanned
 * @property \DateTime $updatedAt
 * @property array $blockedUserIds
 * @property array $teams
 * @property object $custom
 * @property int|null $avgResponseTime
 * @property \DateTime|null $banExpires
 * @property \DateTime|null $deactivatedAt
 * @property \DateTime|null $deletedAt
 * @property string|null $image
 * @property \DateTime|null $lastActive
 * @property string|null $name
 * @property \DateTime|null $revokeTokensIssuedBefore
 * @property array<DeviceResponse>|null $devices
 * @property PrivacySettingsResponse|null $privacySettings
 * @property PushNotificationSettingsResponse|null $pushNotifications
 * @property array|null $teamsRole
 */
class EntityCreatorResponse extends BaseModel
{
    public function __construct(
        public ?int $banCount = null, // Number of minor actions performed on the user
        public ?bool $banned = null,
        public ?\DateTime $createdAt = null,
        public ?int $deletedContentCount = null, // Number of major actions performed on the user
        public ?int $flaggedCount = null, // Number of flag actions performed on the user
        public ?string $id = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?bool $online = null,
        public ?string $role = null,
        public ?bool $shadowBanned = null,
        public ?\DateTime $updatedAt = null,
        public ?array $blockedUserIds = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $banExpires = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?string $image = null,
        public ?\DateTime $lastActive = null,
        public ?string $name = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?PushNotificationSettingsResponse $pushNotifications = null,
        public ?array $teamsRole = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
