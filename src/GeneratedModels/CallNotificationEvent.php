<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to all call members to notify they are getting called
 */
class CallNotificationEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.notification" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        public ?CallResponse $call = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // Call members
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
