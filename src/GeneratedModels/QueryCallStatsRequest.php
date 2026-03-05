<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryCallStatsRequest extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
