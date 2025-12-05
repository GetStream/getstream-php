<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property string|null $next
 * @property string|null $prev
 * @property array<SortParamRequest>|null $sort
 * @property object|null $filter
 */
class QueryPollVotesRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        /** @var array<SortParamRequest>|null Array of sort parameters */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Array of sort parameters
        public ?object $filter = null, // Filter to apply to the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
