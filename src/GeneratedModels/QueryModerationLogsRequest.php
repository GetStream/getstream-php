<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryModerationLogsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filter conditions for moderation logs
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the results
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
