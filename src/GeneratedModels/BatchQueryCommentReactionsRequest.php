<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BatchQueryCommentReactionsRequest extends BaseModel
{
    public function __construct(
        public ?array $commentIds = null, // Comment IDs to fetch the user's reactions for (max 100). Omit to page over all of the user's comment reactions
        public ?object $filter = null, // Optional filter on reaction_type or created_at. To restrict by comment, prefer comment_ids over filter.comment_id: comment_ids is capped at 100 and served by the per-comment index, and filter.comment_id is rejected when comment_ids is omitted
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null, // Server-side only. The user whose reactions to fetch; defaults to the authenticated user for client-side requests
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
