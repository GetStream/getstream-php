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
 * @property \DateTime $updatedAt
 * @property array $blockedUserIds
 * @property array $teams
 * @property object $custom
 * @property int|null $avgResponseTime
 * @property \DateTime|null $deactivatedAt
 * @property \DateTime|null $deletedAt
 * @property string|null $image
 * @property bool|null $invisible
 * @property \DateTime|null $lastActive
 * @property string|null $name
 * @property \DateTime|null $revokeTokensIssuedBefore
 * @property PrivacySettingsResponse|null $privacySettings
 * @property array|null $teamsRole
 */
class UserResponsePrivacyFields extends BaseModel
{
    public function __construct(
        public ?bool $banned = null,
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
        public ?bool $invisible = null,
        public ?\DateTime $lastActive = null,
        public ?string $name = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?array $teamsRole = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
