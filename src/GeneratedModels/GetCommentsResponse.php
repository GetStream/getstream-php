<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ThreadedCommentResponse> $comments
 * @property string|null $next
 * @property string|null $prev
 */
class GetCommentsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ThreadedCommentResponse>|null Threaded listing for the activity */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $comments = null, // Threaded listing for the activity
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
