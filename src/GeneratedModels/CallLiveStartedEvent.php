<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is started. Clients receiving this event should start the call.
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property CallResponse $call
 * @property string $type
 */
class CallLiveStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.live_started" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
