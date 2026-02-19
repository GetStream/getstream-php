<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchResponse extends BaseModel
{
    public function __construct(
        public ?SearchWarning $resultsWarning = null,
        /** @var array<SearchResult>|null */
        #[ArrayOf(SearchResult::class)]
        public ?array $results = null, // Search results
        public ?string $next = null, // Value to pass to the next search query in order to paginate
        public ?string $previous = null, // Value that points to the previous page. Pass as the next value in a search query to paginate backwards
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
