<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FollowResponse> $follows
 * @property string|null $next
 * @property string|null $prev
 */
class QueryFollowsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FollowResponse>|null List of follow relationships matching the query */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of follow relationships matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
