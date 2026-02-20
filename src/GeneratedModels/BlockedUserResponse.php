<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BlockedUserResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $userID = null, // ID of the user who blocked another user
        public ?UserResponse $blockedUser = null,
        public ?string $blockedUserID = null, // ID of the user who got blocked
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
