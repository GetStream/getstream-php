<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * BlockUserRequest is the payload for blocking a user.
 *
 * @property string $userID
 */
class BlockUserRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // the user to block
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
