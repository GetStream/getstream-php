<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is started. Clients receiving this event should start the call.
 */
class CallLiveStartedEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.live_started" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
