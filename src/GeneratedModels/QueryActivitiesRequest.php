<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class QueryActivitiesRequest extends BaseModel
{
    public function __construct(
        public ?bool $includeExpiredActivities = null, // When true, include both expired and non-expired activities in the result.
        public ?bool $includePrivateActivities = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the query
        public ?object $filter = null, // Filters to apply to the query. Supports location-based queries with 'near' and 'within_bounds' operators.
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
