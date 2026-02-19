<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryBookmarkFoldersRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filters to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the query
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
