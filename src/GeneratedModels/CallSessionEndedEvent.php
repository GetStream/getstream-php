<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call session ends
 */
class CallSessionEndedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.session_ended" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        public ?CallResponse $call = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
