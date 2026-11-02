<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for comment feedback submission
 */
class CommentFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $commentID = null, // The ID of the comment that received feedback
        public ?bool $hide = null, // Whether the comment is hidden for the user
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
