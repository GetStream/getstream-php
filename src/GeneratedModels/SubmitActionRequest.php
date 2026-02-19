<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitActionRequest extends BaseModel
{
    public function __construct(
        public ?BanActionRequestPayload $ban = null,
        public ?BlockActionRequestPayload $block = null,
        public ?CustomActionRequestPayload $custom = null,
        public ?DeleteActivityRequestPayload $deleteActivity = null,
        public ?DeleteCommentRequestPayload $deleteComment = null,
        public ?DeleteMessageRequestPayload $deleteMessage = null,
        public ?DeleteReactionRequestPayload $deleteReaction = null,
        public ?DeleteUserRequestPayload $deleteUser = null,
        public ?FlagRequest $flag = null,
        public ?MarkReviewedRequestPayload $markReviewed = null,
        public ?RejectAppealRequestPayload $rejectAppeal = null,
        public ?RestoreActionRequestPayload $restore = null,
        public ?ShadowBlockActionRequestPayload $shadowBlock = null,
        public ?UnbanActionRequestPayload $unban = null,
        public ?UnblockActionRequestPayload $unblock = null,
        public ?UserRequest $user = null,
        public ?string $itemID = null, // UUID of the review queue item to act on
        public ?string $actionType = null, // Type of moderation action to perform. One of: mark_reviewed, delete_message, delete_activity, delete_comment, delete_reaction, ban, custom, unban, restore, delete_user, unblock, block, shadow_block, unmask, kick_user, end_call
        public ?string $appealID = null, // UUID of the appeal to act on (required for reject_appeal, optional for other actions)
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
