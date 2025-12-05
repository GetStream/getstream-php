<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is mark as ended for all its participants. Clients receiving this event should leave the call screen
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property CallResponse $call
 * @property string $type
 * @property string|null $reason
 * @property UserResponse|null $user
 */
class CallEndedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.ended" in this case
        public ?string $reason = null, // The reason why the call ended, if available
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
