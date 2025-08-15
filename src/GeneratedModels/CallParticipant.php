<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallParticipant extends BaseModel
{
    public function __construct(
        public ?bool $banned = null,
        public ?string $id = null,
        public ?\DateTime $joinedAt = null,
        public ?bool $online = null,
        public ?string $role = null,
        public ?string $userSessionID = null,
        public ?object $custom = null,
        public ?array $teamsRole = null,
        public ?int $avgResponseTime = null,
        public ?\DateTime $banExpires = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $deactivatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?\DateTime $lastActive = null,
        public ?\DateTime $lastEngagedAt = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?\DateTime $updatedAt = null,
        public ?array $teams = null,
        public ?PrivacySettings $privacySettings = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
