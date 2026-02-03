<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent asynchronously when a single DTMF digit is received from a SIP participant. The event is broadcast after the digit press ends. Use seq_number for ordering within a session and timestamp for the actual detection time.
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $digit
 * @property int $durationMs
 * @property int $seqNumber
 * @property \DateTime $timestamp
 * @property UserResponse $user
 * @property string $type
 */
class CallDTMFEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $digit = null, // The DTMF digit (0-9, *, #, A-D)
        public ?int $durationMs = null, // Duration of the digit press in milliseconds
        public ?int $seqNumber = null, // Monotonically increasing sequence number for ordering DTMF events within a session
        public ?\DateTime $timestamp = null, // When the digit press ended and was detected
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.dtmf" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
