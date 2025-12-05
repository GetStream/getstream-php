<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user accepts a notification to join a call.
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property CallResponse $call
 * @property UserResponse $user
 * @property string $type
 */
class CallAcceptedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.accepted" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
