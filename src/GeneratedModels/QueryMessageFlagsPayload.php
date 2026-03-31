<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMessageFlagsPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Filter conditions to apply to the query
        public ?bool $showDeletedMessages = null, // Whether to include deleted messages in the results
        public ?int $limit = null,
        public ?int $offset = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Array of sort parameters
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
