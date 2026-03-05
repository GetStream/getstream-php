<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to call members who did not accept/reject/join the call to notify they missed the call
 */
class CallMissedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.notification" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        public ?CallResponse $call = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // List of members who missed the call
        public ?UserResponse $user = null,
        public ?bool $notifyUser = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
