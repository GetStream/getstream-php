<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFollowsResponse extends BaseModel
{
    public function __construct(
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of follow relationships matching the query
        public ?array $groupCounts = null, // Accepted following counts keyed by followed feed group. Present only when include_group_counts is set with a source_feed equality.
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
