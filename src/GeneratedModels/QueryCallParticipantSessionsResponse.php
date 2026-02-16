<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class QueryCallParticipantSessionsResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?int $duration = null, // Duration of the request in milliseconds
        public ?int $totalParticipantDuration = null,
        public ?int $totalParticipantSessions = null,
        /** @var array<ParticipantSessionDetails>|null */
        #[ArrayOf(ParticipantSessionDetails::class)]
        public ?array $participantsSessions = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?CallSessionResponse $session = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
