<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * User response object
 */
class UserResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique user identifier
        public ?string $name = null, // Optional name of user
        public ?string $image = null,
        public ?object $custom = null, // Custom data for this object
        public ?string $language = null, // Preferred language of a user
        public ?string $role = null, // Determines the set of user permissions
        public ?array $teams = null, // List of teams user is a part of
        public ?array $teamsRole = null,
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?\DateTime $deletedAt = null, // Date/time of deletion
        public ?bool $banned = null, // Whether a user is banned or not
        public ?bool $online = null, // Whether a user online or not
        public ?\DateTime $lastActive = null, // Date of last activity
        public ?\DateTime $revokeTokensIssuedBefore = null, // Revocation date for tokens
        public ?\DateTime $deactivatedAt = null, // Date of deactivation
        public ?array $blockedUserIds = null,
        public ?int $avgResponseTime = null,
        public ?bool $shadowBanned = null, // Whether a user is shadow banned
        public ?bool $bypassModeration = null,
        public ?\DateTime $banExpires = null, // Date when ban expires
        public ?PushNotificationSettingsResponse $pushNotifications = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null, // List of devices user is using
        public ?bool $invisible = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
