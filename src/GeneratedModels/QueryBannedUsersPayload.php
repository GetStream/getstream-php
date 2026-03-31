<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryBannedUsersPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Filter conditions to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Array of sort parameters
        public ?int $limit = null, // Number of records to return
        public ?int $offset = null, // Number of records to offset
        public ?bool $excludeExpiredBans = null, // Whether to exclude expired bans or not
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
