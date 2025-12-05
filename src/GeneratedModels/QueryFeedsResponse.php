<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FeedResponse> $feeds
 * @property string|null $next
 * @property string|null $prev
 */
class QueryFeedsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FeedResponse>|null List of feeds matching the query */
        #[ArrayOf(FeedResponse::class)]
        public ?array $feeds = null, // List of feeds matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
