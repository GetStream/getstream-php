<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCommentRepliesResponse extends BaseModel
{
    public function __construct(
        /** @var array<ThreadedCommentResponse>|null */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $comments = null, // Threaded listing of replies to the comment
        public ?string $sort = null, // Sort order used for the replies (first, last, top, best, controversial)
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
