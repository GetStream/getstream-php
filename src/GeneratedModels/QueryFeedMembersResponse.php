<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FeedMemberResponse> $members
 * @property string|null $next
 * @property string|null $prev
 */
class QueryFeedMembersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FeedMemberResponse>|null List of feed members */
        #[ArrayOf(FeedMemberResponse::class)]
        public ?array $members = null, // List of feed members
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
