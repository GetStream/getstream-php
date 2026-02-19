<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallSessionResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $endedAt = null,
        /** @var array<CallParticipantResponse>|null */
        #[ArrayOf(CallParticipantResponse::class)]
        public ?array $participants = null,
        public ?array $participantsCountByRole = null,
        public ?int $anonymousParticipantCount = null,
        public ?array $rejectedBy = null,
        public ?array $acceptedBy = null,
        public ?array $missedBy = null,
        public ?\DateTime $liveStartedAt = null,
        public ?\DateTime $liveEndedAt = null,
        public ?\DateTime $timerEndsAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
