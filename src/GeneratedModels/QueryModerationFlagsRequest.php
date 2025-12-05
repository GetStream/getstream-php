<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property string|null $next
 * @property string|null $prev
 * @property array<SortParam>|null $sort
 * @property object|null $filter
 */
class QueryModerationFlagsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        /** @var array<SortParam>|null */
        #[ArrayOf(SortParam::class)]
        public ?array $sort = null,
        public ?object $filter = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
