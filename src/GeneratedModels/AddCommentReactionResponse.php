<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class AddCommentReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request
        public ?CommentResponse $comment = null,
        public ?FeedsReactionResponse $reaction = null,
        public ?bool $notificationCreated = null, // Whether a notification activity was successfully created
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
