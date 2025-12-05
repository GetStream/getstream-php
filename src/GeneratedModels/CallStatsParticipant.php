<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $userID
 * @property array<CallStatsParticipantSession> $sessions
 * @property \DateTime|null $latestActivityAt
 * @property string|null $name
 * @property array|null $roles
 */
class CallStatsParticipant extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        /** @var array<CallStatsParticipantSession>|null */
        #[ArrayOf(CallStatsParticipantSession::class)]
        public ?array $sessions = null,
        public ?\DateTime $latestActivityAt = null,
        public ?string $name = null,
        public ?array $roles = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
