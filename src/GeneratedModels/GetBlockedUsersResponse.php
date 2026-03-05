<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetBlockedUsersResponse extends BaseModel
{
    public function __construct(
        /** @var array<BlockedUserResponse>|null */
        #[ArrayOf(BlockedUserResponse::class)]
        public ?array $blocks = null, // Array of blocked user object
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
