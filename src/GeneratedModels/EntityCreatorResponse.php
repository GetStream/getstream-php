<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EntityCreatorResponse extends BaseModel
{
    public function __construct(
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
        public ?array $blockedUserIds = null,
        public ?int $avgResponseTime = null,
        public ?bool $shadowBanned = null,
        public ?\DateTime $banExpires = null,
        public ?PushNotificationSettingsResponse $pushNotifications = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null,
        public ?bool $invisible = null,
        public ?int $banCount = null, // Number of minor actions performed on the user
        public ?int $deletedContentCount = null, // Number of major actions performed on the user
        public ?int $flaggedCount = null, // Number of flag actions performed on the user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
