<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddCommentReactionResponse extends BaseModel
{
    public function __construct(
        public ?CommentResponse $comment = null,
        public ?FeedsReactionResponse $reaction = null,
        /** @deprecated */
        public ?bool $notificationCreated = null, // Deprecated. Mirrors notification_accepted; use notification_accepted for async enqueue status Deprecated: use notification_accepted
        public ?bool $notificationAccepted = null, // Whether notification creation was accepted for asynchronous processing
        public ?string $notificationTaskID = null, // ID of the async notification-creation task; poll GET /tasks/{id} for its status
        public ?ActivityResponse $referenceActivity = null,
        public ?string $duration = null, // Duration of the request
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
