<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ListFeedViewsResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, FeedViewResponse>|null */
        #[MapOf(FeedViewResponse::class)]
        public ?array $views = null, // Map of feed view ID to feed view
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
