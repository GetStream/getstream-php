<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedMembersResponse extends BaseModel
{
    public function __construct(
        /** @var array<FeedMemberResponse>|null */
        #[ArrayOf(FeedMemberResponse::class)]
        public ?array $members = null, // List of feed members
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
