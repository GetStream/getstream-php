<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call session starts
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $sessionID
 * @property CallResponse $call
 * @property string $type
 */
class CallSessionStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null, // Call session ID
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.session_started" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
