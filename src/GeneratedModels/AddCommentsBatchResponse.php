<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<CommentResponse> $comments
 */
class AddCommentsBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CommentResponse>|null List of comments added */
        #[ArrayOf(CommentResponse::class)]
        public ?array $comments = null, // List of comments added
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
