<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllMessagesSection extends BaseModel
{
    public function __construct(
        /** @var array<SearchResult>|null */
        #[ArrayOf(SearchResult::class)]
        public ?array $results = null, // Matching messages, newest first, in the same shape as the search endpoint's results
        public ?SearchWarning $resultsWarning = null,
        public ?string $next = null, // Opaque cursor for the next page of this section, present only when more results exist. Pass it back under next.messages with the same query
        public ?SearchAllWarning $warning = null,
        public ?SearchAllSectionError $error = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
