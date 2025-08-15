<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * UnblockUserRequest is the payload for unblocking a user.
 */
class UnblockUserRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,    // the user to unblock 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
