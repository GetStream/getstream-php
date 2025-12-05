<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * User response object
 *
 * @property bool $banned
 * @property \DateTime $createdAt
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
class UserResponse extends BaseModel
{
    public function __construct(
        public ?bool $banned = null, // Whether a user is banned or not
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $id = null, // Unique user identifier
        public ?bool $invisible = null,
        public ?string $language = null, // Preferred language of a user
        public ?bool $online = null, // Whether a user online or not
        public ?string $role = null, // Determines the set of user permissions
        public ?bool $shadowBanned = null, // Whether a user is shadow banned
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?array $blockedUserIds = null,
        public ?array $teams = null, // List of teams user is a part of
        public ?object $custom = null, // Custom data for this object
        public ?int $avgResponseTime = null,
        public ?\DateTime $banExpires = null, // Date when ban expires
        public ?\DateTime $deactivatedAt = null, // Date of deactivation
        public ?\DateTime $deletedAt = null, // Date/time of deletion
        public ?string $image = null,
        public ?\DateTime $lastActive = null, // Date of last activity
        public ?string $name = null, // Optional name of user
        public ?\DateTime $revokeTokensIssuedBefore = null, // Revocation date for tokens
        /** @var array<DeviceResponse>|null List of devices user is using */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null, // List of devices user is using
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?PushNotificationSettingsResponse $pushNotifications = null,
        public ?array $teamsRole = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
