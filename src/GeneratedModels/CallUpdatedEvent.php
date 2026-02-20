<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is updated, clients should use this update the local state of the call.
 * This event also contains the capabilities by role for the call, clients should update the own_capability for the current.
 */
class CallUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.updated" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?CallResponse $call = null,
        public ?array $capabilitiesByRole = null, // The capabilities by role for this call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
