<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CommentFeedbackEventPayload extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null, // User response object
        public ?string $commentID = null, // The comment that received feedback
        public ?bool $hide = null, // Whether the comment is hidden for the user
        public ?\DateTime $createdAt = null, // When the feedback was created
        public ?\DateTime $updatedAt = null, // When the feedback was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
