<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to call participants to notify when a user is kicked from a call. Clients should make the kicked user leave the call UI.
 */
class KickedUserEvent extends BaseModel
{
    public function __construct(
        public ?UserResponse $kickedByUser = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.kicked_user" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
