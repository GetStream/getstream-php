<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $callID
 * @property string $callSessionID
 * @property string $callType
 * @property int $duration
 * @property int $totalParticipantDuration
 * @property int $totalParticipantSessions
 * @property array<ParticipantSessionDetails> $participantsSessions
 * @property string|null $next
 * @property string|null $prev
 * @property CallSessionResponse|null $session
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
