<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is mark as ended for all its participants. Clients receiving this event should leave the call screen
 */
class CallEndedEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.ended" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $reason = null, // The reason why the call ended, if available
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
