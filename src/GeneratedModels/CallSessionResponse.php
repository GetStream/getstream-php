<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $anonymousParticipantCount
 * @property string $id
 * @property array<CallParticipantResponse> $participants
 * @property array $acceptedBy
 * @property array $missedBy
 * @property array $participantsCountByRole
 * @property array $rejectedBy
 * @property \DateTime|null $endedAt
 * @property \DateTime|null $liveEndedAt
 * @property \DateTime|null $liveStartedAt
 * @property \DateTime|null $startedAt
 * @property \DateTime|null $timerEndsAt
 */
class CallSessionResponse extends BaseModel
{
    public function __construct(
        public ?int $anonymousParticipantCount = null,
        public ?string $id = null,
        /** @var array<CallParticipantResponse>|null */
        #[ArrayOf(CallParticipantResponse::class)]
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
