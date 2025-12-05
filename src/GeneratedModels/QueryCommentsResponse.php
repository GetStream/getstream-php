<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<CommentResponse> $comments
 * @property string|null $next
 * @property string|null $prev
 */
class QueryCommentsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CommentResponse>|null List of comments matching the query */
        #[ArrayOf(CommentResponse::class)]
        public ?array $comments = null, // List of comments matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
