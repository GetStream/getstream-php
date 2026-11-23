<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedsReactionsRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // The user whose reactions to list
        public ?string $objectType = null, // Which reactions to list: activity reactions or comment reactions
        public ?object $filter = null, // Optional filter; only reaction_type and created_at are accepted
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort by created_at only (a single field); defaults to created_at descending
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
