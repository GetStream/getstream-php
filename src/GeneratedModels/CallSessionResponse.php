<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSessionResponse extends BaseModel
{
    public function __construct(
        public ?int $anonymousParticipantCount = null,
        public ?string $id = null,
        public ?array $participants = null,
        public ?array $acceptedBy = null,
        public ?array $missedBy = null,
        public ?array $participantsCountByRole = null,
        public ?array $rejectedBy = null,
        public ?\DateTime $endedAt = null,
        public ?\DateTime $liveEndedAt = null,
        public ?\DateTime $liveStartedAt = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $timerEndsAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
