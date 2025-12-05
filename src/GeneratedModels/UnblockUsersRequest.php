<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $blockedUserID
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class UnblockUsersRequest extends BaseModel
{
    public function __construct(
        public ?string $blockedUserID = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
