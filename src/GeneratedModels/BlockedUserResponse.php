<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $blockedUserID
 * @property \DateTime $createdAt
 * @property string $userID
 * @property UserResponse $blockedUser
 * @property UserResponse $user
 */
class BlockedUserResponse extends BaseModel
{
    public function __construct(
        public ?string $blockedUserID = null, // ID of the user who got blocked
        public ?\DateTime $createdAt = null,
        public ?string $userID = null, // ID of the user who blocked another user
        public ?UserResponse $blockedUser = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
