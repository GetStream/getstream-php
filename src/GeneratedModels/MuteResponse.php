<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MuteResponse extends BaseModel
{
    public function __construct(
        public ?OwnUserResponse $ownUser = null,
        /** @var array<UserMuteResponse>|null */
        #[ArrayOf(UserMuteResponse::class)]
        public ?array $mutes = null, // Object with mutes (if multiple users were muted)
        public ?array $nonExistingUsers = null, // A list of users that can't be found. Common cause for this is deleted users
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
