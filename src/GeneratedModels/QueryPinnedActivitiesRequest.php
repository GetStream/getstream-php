<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryPinnedActivitiesRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filters to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the query
        public ?bool $enrichOwnFields = null,
        public ?bool $includeSoftDeletedActivities = null, // When true, return pinned activities even if they are soft-deleted. Server-side only; not allowed when a user is set.
        public ?bool $includeModeratedActivities = null, // When true, return pinned activities even if moderation hides them (shadowed or removed). Server-side only; not allowed when a user is set.
        public ?bool $includeExpiredActivities = null, // When true, return pinned activities even if they have expired. Server-side only; not allowed when a user is set.
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
