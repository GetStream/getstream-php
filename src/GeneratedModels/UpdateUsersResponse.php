<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateUsersResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, FullUserResponse>|null */
        #[MapOf(FullUserResponse::class)]
        public ?array $users = null, // Object containing users
        public ?string $membershipDeletionTaskID = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
