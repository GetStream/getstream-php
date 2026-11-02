<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to provide feedback on a comment
 */
class CommentFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?bool $hide = null, // Whether to hide this comment for the user
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
