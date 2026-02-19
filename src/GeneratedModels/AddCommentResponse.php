<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddCommentResponse extends BaseModel
{
    public function __construct(
        public ?CommentResponse $comment = null,
        public ?bool $notificationCreated = null, // Whether a notification activity was successfully created
        public ?int $mentionNotificationsCreated = null, // Number of mention notification activities created for mentioned users
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
