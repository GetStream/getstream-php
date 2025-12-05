<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime|null $archivedAt
 * @property \DateTime|null $banExpires
 * @property bool|null $banned
 * @property bool|null $blocked
 * @property string|null $channelRole
 * @property \DateTime|null $createdAt
 * @property \DateTime|null $deletedAt
 * @property bool|null $hidden
 * @property \DateTime|null $inviteAcceptedAt
 * @property \DateTime|null $inviteRejectedAt
 * @property bool|null $invited
 * @property bool|null $isGlobalBanned
 * @property bool|null $isModerator
 * @property bool|null $notificationsMuted
 * @property \DateTime|null $pinnedAt
 * @property bool|null $shadowBanned
 * @property string|null $status
 * @property \DateTime|null $updatedAt
 * @property string|null $userID
 * @property array|null $deletedMessages
 * @property DenormalizedChannelFields|null $channel
 * @property object|null $custom
 * @property User|null $user
 */
class ChannelMember extends BaseModel
{
    public function __construct(
        public ?\DateTime $archivedAt = null,
        public ?\DateTime $banExpires = null,
        public ?bool $banned = null,
        public ?bool $blocked = null,
        public ?string $channelRole = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $hidden = null,
        public ?\DateTime $inviteAcceptedAt = null,
        public ?\DateTime $inviteRejectedAt = null,
        public ?bool $invited = null,
        public ?bool $isGlobalBanned = null,
        public ?bool $isModerator = null,
        public ?bool $notificationsMuted = null,
        public ?\DateTime $pinnedAt = null,
        public ?bool $shadowBanned = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?array $deletedMessages = null,
        public ?DenormalizedChannelFields $channel = null,
        public ?object $custom = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
