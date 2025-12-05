<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $actionType
 * @property string $itemID
 * @property string|null $userID
 * @property BanActionRequest|null $ban
 * @property BlockActionRequest|null $block
 * @property CustomActionRequest|null $custom
 * @property DeleteActivityRequest|null $deleteActivity
 * @property DeleteCommentRequest|null $deleteComment
 * @property DeleteMessageRequest|null $deleteMessage
 * @property DeleteReactionRequest|null $deleteReaction
 * @property DeleteUserRequest|null $deleteUser
 * @property MarkReviewedRequest|null $markReviewed
 * @property ShadowBlockActionRequest|null $shadowBlock
 * @property UnbanActionRequest|null $unban
 * @property UserRequest|null $user
 */
class SubmitActionRequest extends BaseModel
{
    public function __construct(
        public ?string $actionType = null, // Type of moderation action to perform (mark_reviewed, delete_message, etc.)
        public ?string $itemID = null, // UUID of the review queue item to act on
        public ?string $userID = null,
        public ?BanActionRequest $ban = null,
        public ?BlockActionRequest $block = null,
        public ?CustomActionRequest $custom = null,
        public ?DeleteActivityRequest $deleteActivity = null,
        public ?DeleteCommentRequest $deleteComment = null,
        public ?DeleteMessageRequest $deleteMessage = null,
        public ?DeleteReactionRequest $deleteReaction = null,
        public ?DeleteUserRequest $deleteUser = null,
        public ?MarkReviewedRequest $markReviewed = null,
        public ?ShadowBlockActionRequest $shadowBlock = null,
        public ?UnbanActionRequest $unban = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
