<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFollowsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filters to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the query
        public ?bool $includeGroupCounts = null, // When true (server-side only), the response includes group_counts: accepted following counts keyed by the followed feed's group. Requires exactly one source_feed / source_fid string equality. HTTP 400 if target_feed appears, if two source FIDs are given, or if $in / $or / $nor mentions those keys. Independent of paging and of other filters, including status.
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
