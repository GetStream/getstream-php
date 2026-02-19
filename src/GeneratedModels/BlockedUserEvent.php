<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to call participants to notify when a user is blocked on a call, clients can use this event to show a notification.
 * If the user is the current user, the client should leave the call screen as well
 */
class BlockedUserEvent extends BaseModel
{
    public function __construct(
        public ?UserResponse $blockedByUser = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.blocked_user" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
