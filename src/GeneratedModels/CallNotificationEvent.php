<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent to all call members to notify they are getting called
 */
class CallNotificationEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null,    // Call session ID 
        public ?array $members = null,    // Call members 
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null,    // The type of event: "call.notification" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
