<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<SearchResult> $results
 * @property string|null $next
 * @property string|null $previous
 * @property SearchWarning|null $resultsWarning
 */
class SearchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<SearchResult>|null Search results */
        #[ArrayOf(SearchResult::class)]
        public ?array $results = null, // Search results
        public ?string $next = null, // Value to pass to the next search query in order to paginate
        public ?string $previous = null, // Value that points to the previous page. Pass as the next value in a search query to paginate backwards
        public ?SearchWarning $resultsWarning = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
