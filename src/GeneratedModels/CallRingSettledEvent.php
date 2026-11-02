<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to the backend once per ring attempt, when the attempt reaches its final outcome: a callee's accept or reject closed it, the caller cancelled it, the ring timed out, or the call ended. It is delivered exactly once per ring_id and carries the final state of every rung user.
 */
class CallRingSettledEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.ring_settled" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        public ?string $ringID = null, // Identifies this ring of the call session, as carried on call.ring
        public ?string $initiatedBy = null, // ID of the user who rang
        public ?\DateTime $rangAt = null, // When the ring was sent
        public ?string $outcome = null, // Final outcome of the ring: answered_all, answered_some, rejected_all, missed_all, cancelled or mixed
        public ?\DateTime $settledAt = null, // When the outcome left ringing
        public ?string $settledBy = null, // ID of the user whose action closed the ring, or 'server' for the missed-call deadline and automatic ends
        public ?string $settleReason = null, // Why the ring closed: answered, rejected, cancel, timeout, ended or auto_end
        /** @var array<string, RingSettledTarget>|null */
        #[MapOf(RingSettledTarget::class)]
        public ?array $targets = null, // Final state of every rung user, keyed by user ID
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
