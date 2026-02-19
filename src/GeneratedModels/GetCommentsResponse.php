<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCommentsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $sort = null, // Sort order used for the comments (first, last, top, best, controversial)
        /** @var array<ThreadedCommentResponse>|null */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $comments = null, // Threaded listing for the activity
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
