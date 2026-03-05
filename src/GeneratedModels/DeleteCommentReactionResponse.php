<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteCommentReactionResponse extends BaseModel
{
    public function __construct(
        public ?CommentResponse $comment = null,
        public ?FeedsReactionResponse $reaction = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
