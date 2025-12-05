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
class QuerySegmentTargetsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Limit
        public ?string $next = null, // Next
        public ?string $prev = null, // Prev
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?object $filter = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
