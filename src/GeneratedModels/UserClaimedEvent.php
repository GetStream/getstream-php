<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a regular user claims a guest user. The guest's channels, messages and reactions are then moved to the claiming user. Webhooks receive it when the claim is made; the claiming user's websocket connections receive it when the move has completed, as the signal to reload channels and messages.
 */
class UserClaimedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "user.claimed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?UserResponseCommonFields $claimedBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
