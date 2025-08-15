<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?string $team = null,
        public ?array $activeLiveLocations = null,
        public ?array $invites = null,
        public ?array $members = null,
        public ?ChannelConfig $config = null,
        public ?ConfigOverrides $configOverrides = null,
        public ?User $createdBy = null,
        public ?User $truncatedBy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
