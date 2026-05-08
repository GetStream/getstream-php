<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitActionRequest extends BaseModel
{
    public function __construct(
        public ?string $itemID = null, // UUID of the review queue item to act on
        public ?string $actionType = null, // Type of moderation action to perform. One of: mark_reviewed, delete_message, delete_activity, delete_comment, delete_reaction, ban, custom, unban, restore, delete_user, unblock, block, shadow_block, unmask, kick_user, end_call, escalate, de_escalate
        public ?string $appealID = null, // UUID of the appeal to act on (required for reject_appeal, optional for other actions)
        public ?DeleteMessageRequestPayload $deleteMessage = null,
        public ?DeleteActivityRequestPayload $deleteActivity = null,
        public ?DeleteCommentRequestPayload $deleteComment = null,
        public ?DeleteReactionRequestPayload $deleteReaction = null,
        public ?DeleteUserRequestPayload $deleteUser = null,
        public ?MarkReviewedRequestPayload $markReviewed = null,
        public ?BanActionRequestPayload $ban = null,
        public ?CustomActionRequestPayload $custom = null,
        public ?UnbanActionRequestPayload $unban = null,
        public ?RestoreActionRequestPayload $restore = null,
        public ?UnblockActionRequestPayload $unblock = null,
        public ?BlockActionRequestPayload $block = null,
        public ?ShadowBlockActionRequestPayload $shadowBlock = null,
        public ?BypassActionRequest $bypass = null,
        public ?RejectAppealRequestPayload $rejectAppeal = null,
        public ?FlagRequest $flag = null,
        public ?EscalatePayload $escalate = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
