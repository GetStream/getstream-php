<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSession extends BaseModel
{
    public function __construct(
        public ?int $anonymousParticipantCount = null,
        public ?int $appPK = null,
        public ?string $callID = null,
        public ?string $callType = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null,
        public ?array $activeSFUs = null,
        public ?array $participants = null,
        public ?array $sFUIDs = null,
        public ?array $acceptedBy = null,
        public ?array $missedBy = null,
        public ?array $participantsCountByRole = null,
        public ?array $rejectedBy = null,
        public ?array $userPermissionOverrides = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $endedAt = null,
        public ?\DateTime $liveEndedAt = null,
        public ?\DateTime $liveStartedAt = null,
        public ?\DateTime $ringAt = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $timerEndsAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
