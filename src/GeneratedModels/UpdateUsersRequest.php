<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpdateUsersRequest extends BaseModel
{
    public function __construct(
        /** @var array<UserRequest>|null */
        #[ArrayOf(UserRequest::class)]
        public ?array $users = null, // Object containing users
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
