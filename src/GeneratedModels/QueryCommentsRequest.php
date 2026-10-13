<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryCommentsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filter to apply to the query
        public ?string $sort = null, // Array of sort parameters
        public ?string $idAround = null, // Returns the comment with the specified ID along with surrounding comments for context
        public ?bool $includeSoftDeletedComments = null, // When true, include soft-deleted comments in the result. Server-side only, and requires an object_id filter. Covers comments removed via deleteComment and via soft user-data deletion. Moderation-actioned comments (removed, hidden, shadow_blocked) remain excluded, as are comments whose parent activity is itself deleted.
        public ?int $limit = null, // Maximum number of comments to return
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
