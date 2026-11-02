<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryChannelBansRequest extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Filter conditions to apply to the query
        public ?bool $excludeExpiredBans = null, // Whether to exclude expired bans or not
        public ?bool $includeTotal = null, // When true, the response includes total and total_by_scope: the number of banned users overall and per scope, independent of paging
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
