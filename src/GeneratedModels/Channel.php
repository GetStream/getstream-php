<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $autoTranslationLanguage
 * @property string $cid
 * @property \DateTime $createdAt
 * @property bool $disabled
 * @property bool $frozen
 * @property string $id
 * @property string $type
 * @property \DateTime $updatedAt
 * @property object $custom
 * @property bool|null $autoTranslationEnabled
 * @property int|null $cooldown
 * @property \DateTime|null $deletedAt
 * @property string|null $lastCampaigns
 * @property \DateTime|null $lastMessageAt
 * @property int|null $memberCount
 * @property int|null $messageCount
 * @property \DateTime|null $messageCountUpdatedAt
 * @property string|null $team
 * @property array<SharedLocation>|null $activeLiveLocations
 * @property array|null $filterTags
 * @property array<ChannelMember>|null $invites
 * @property array<ChannelMember>|null $members
 * @property ChannelConfig|null $config
 * @property ConfigOverrides|null $configOverrides
 * @property User|null $createdBy
 * @property array|null $membersLookup
 * @property User|null $truncatedBy
 */
class Channel extends BaseModel
{
    public function __construct(
        public ?string $autoTranslationLanguage = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?bool $autoTranslationEnabled = null,
        public ?int $cooldown = null,
        public ?\DateTime $deletedAt = null,
        public ?string $lastCampaigns = null,
        public ?\DateTime $lastMessageAt = null,
        public ?int $memberCount = null,
        public ?int $messageCount = null,
        public ?\DateTime $messageCountUpdatedAt = null,
        public ?string $team = null,
        /** @var array<SharedLocation>|null */
        #[ArrayOf(SharedLocation::class)]
        public ?array $activeLiveLocations = null,
        public ?array $filterTags = null,
        /** @var array<ChannelMember>|null */
        #[ArrayOf(ChannelMember::class)]
        public ?array $invites = null,
        /** @var array<ChannelMember>|null */
        #[ArrayOf(ChannelMember::class)]
        public ?array $members = null,
        public ?ChannelConfig $config = null,
        public ?ConfigOverrides $configOverrides = null,
        public ?User $createdBy = null,
        public ?array $membersLookup = null,
        public ?User $truncatedBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
