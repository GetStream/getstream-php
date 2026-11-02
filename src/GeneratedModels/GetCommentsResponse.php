<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCommentsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ThreadedCommentResponse>|null */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $comments = null, // Threaded listing for the activity
        public ?string $sort = null, // Sort order used for the comments (first, last, top, best, controversial)
        public ?int $commentCount = null, // Total number of comments on the object, including replies at every depth
        public ?int $topLevelCommentCount = null, // Number of comments directly on the object, excluding replies. Independent of depth, replies_limit and id_around, and not adjusted per viewer. Only present when include_top_level_comment_count is set
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
