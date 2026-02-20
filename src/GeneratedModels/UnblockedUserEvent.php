<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user is unblocked on a call,
 * this can be useful to notify the user that they can now join the call again
 */
class UnblockedUserEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.unblocked_user" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
