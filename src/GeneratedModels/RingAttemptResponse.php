<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * One ring of a call session: who was rung, what each target did about it, and how the ring settled.
 */
class RingAttemptResponse extends BaseModel
{
    public function __construct(
        public ?int $appPk = null, // The application this ring belongs to
        public ?string $ringID = null, // The ring, as published in the ring_id of the call.ring event
        public ?string $callType = null, // The type of the call that was rung
        public ?string $callID = null, // The ID of the call that was rung
        public ?string $sessionID = null, // The call session that was rung
        public ?string $initiatedBy = null, // The user that started the ring
        public ?\DateTime $createdAt = null, // When the ring went out
        public ?\DateTime $expiresAt = null, // When the ring expires, i.e. when the missed call deadline fires
        public ?\DateTime $deletedAt = null, // When the ring was deleted
        public ?string $outcome = null, // The derived outcome: ringing, answered_some, answered_all, rejected_all, missed_all, cancelled or mixed
        public ?\DateTime $settledAt = null, // When the outcome left ringing
        public ?string $settledBy = null, // The user that settled the ring, or 'server'; empty while it is still ringing
        public ?string $settleReason = null, // Why the ring settled: answered, rejected, cancel, timeout, ended or auto_end; empty while it is still ringing
        public ?object $custom = null, // Opaque context stored on the ring by the caller
        /** @var array<string, RingTargetResponse>|null */
        #[MapOf(RingTargetResponse::class)]
        public ?array $targets = null, // The rung users, keyed by user ID
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
