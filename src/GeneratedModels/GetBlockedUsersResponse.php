<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetBlockedUsersResponse extends BaseModel
{
    public function __construct(
        /** @var array<BlockedUserResponse>|null */
        #[ArrayOf(BlockedUserResponse::class)]
        public ?array $blocks = null, // Blocked users on this page, oldest block first
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $next = null, // Cursor for the next page. Absent on the last page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
