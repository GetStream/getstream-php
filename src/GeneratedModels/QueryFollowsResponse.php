<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFollowsResponse extends BaseModel
{
    public function __construct(
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of follow relationships matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
