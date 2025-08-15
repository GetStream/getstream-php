<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubmitActionRequest extends BaseModel
{
    public function __construct(
        public ?string $actionType = null,    // Type of moderation action to perform (mark_reviewed, delete_message, etc.) 
        public ?string $itemID = null,    // UUID of the review queue item to act on 
        public ?string $userID = null,
        public ?BanActionRequest $ban = null,
        public ?CustomActionRequest $custom = null,
        public ?DeleteActivityRequest $deleteActivity = null,
        public ?DeleteMessageRequest $deleteMessage = null,
        public ?DeleteReactionRequest $deleteReaction = null,
        public ?DeleteUserRequest $deleteUser = null,
        public ?MarkReviewedRequest $markReviewed = null,
        public ?UnbanActionRequest $unban = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
