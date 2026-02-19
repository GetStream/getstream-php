<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddCommentsBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<CommentResponse>|null */
        #[ArrayOf(CommentResponse::class)]
        public ?array $comments = null, // List of comments added
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
