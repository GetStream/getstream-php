<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ClaimGuestUserRequest extends BaseModel
{
    public function __construct(
        public ?string $guestUserID = null, // ID of the guest user to claim
        public ?string $userID = null, // ID of the regular user that claims the guest and receives its channels, messages and reactions
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
