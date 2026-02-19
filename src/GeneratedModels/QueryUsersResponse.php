<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryUsersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<FullUserResponse>|null */
        #[ArrayOf(FullUserResponse::class)]
        public ?array $users = null, // Array of users as result of filters applied.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
