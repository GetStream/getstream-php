<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryDeletedChannelsRequest extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Optional filter. Omit it, or pass {}, to list every soft-deleted channel of the app; for example {"team": "tenant-a"} narrows to one tenant
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort order. Only created_at is supported; defaults to created_at ascending
        public ?int $limit = null, // Number of channels per page, 1-100 (default 25)
        public ?string $next = null, // Cursor for the next page, from the previous response
        public ?string $prev = null, // Cursor for the previous page, from the previous response
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
