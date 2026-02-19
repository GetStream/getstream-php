<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user accepts a notification to join a call.
 */
class CallAcceptedEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.accepted" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
