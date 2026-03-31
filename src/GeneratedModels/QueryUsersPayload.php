<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryUsersPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Filter conditions to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Array of sort parameters
        public ?bool $presence = null,
        public ?bool $includeDeactivatedUsers = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
