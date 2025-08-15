<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Call extends BaseModel
{
    public function __construct(
        public ?int $appPK = null,
        public ?bool $backstage = null,
        public ?string $cID = null,
        public ?string $channelCID = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByUserID = null,
        public ?string $currentSessionID = null,
        public ?string $iD = null,
        public ?string $lastSessionID = null,
        public ?string $team = null,
        public ?string $thumbnailURL = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?array $blockedUserIDs = null,
        public ?array $blockedUsers = null,
        public ?array $egresses = null,
        public ?array $members = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $egressUpdatedAt = null,
        public ?\DateTime $endedAt = null,
        public ?int $joinAheadTimeSeconds = null,
        public ?\DateTime $lastHeartbeatAt = null,
        public ?int $memberCount = null,
        public ?\DateTime $startsAt = null,
        public ?CallType $callType = null,
        public ?User $createdBy = null,
        public ?MemberLookup $memberLookup = null,
        public ?CallSession $session = null,
        public ?CallSettings $settings = null,
        public ?CallSettings $settingsOverrides = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
