<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitActionRequest extends BaseModel
{
    public function __construct(
        public ?string $itemID = null, // UUID of the review queue item to act on
        public ?string $actionType = null, // Type of moderation action to perform. One of: mark_reviewed, delete_message, delete_activity, delete_comment, delete_reaction, ban, custom, unban, restore, delete_user, delete_user_messages, unblock, block, shadow_block, unmask, kick_user, end_call, escalate, de_escalate
        public ?string $appealID = null, // UUID of the appeal to act on (required for reject_appeal, optional for other actions)
        public ?DeleteMessageRequestPayload $deleteMessage = null, // Configuration for message deletion action
        public ?DeleteActivityRequestPayload $deleteActivity = null, // Configuration for activity deletion action
        public ?DeleteCommentRequestPayload $deleteComment = null, // Configuration for comment deletion action
        public ?DeleteReactionRequestPayload $deleteReaction = null, // Configuration for reaction deletion action
        public ?DeleteUserRequestPayload $deleteUser = null, // Configuration for user deletion action
        public ?DeleteUserMessagesRequestPayload $deleteUserMessages = null, // Configuration for deleting all of a user's chat messages without banning them or deleting their account
        public ?MarkReviewedRequestPayload $markReviewed = null, // Configuration for mark reviewed action
        public ?BanActionRequestPayload $ban = null, // Configuration for ban moderation action
        public ?CustomActionRequestPayload $custom = null, // Configuration for custom moderation action
        public ?UnbanActionRequestPayload $unban = null, // Configuration for unban moderation action
        public ?RestoreActionRequestPayload $restore = null, // Configuration for restore action. State-aware: reverses whichever of a delete, a block, or a shadow block currently applies to the content (including both a delete and a block/shadow block at once).
        public ?UnblockActionRequestPayload $unblock = null, // Deprecated: use restore instead — it now also reverses a block or shadow block. Configuration for unblock action.
        public ?BlockActionRequestPayload $block = null, // Configuration for block action
        public ?ShadowBlockActionRequestPayload $shadowBlock = null, // Configuration for shadow block action
        public ?BypassActionRequest $bypass = null,
        public ?RejectAppealRequestPayload $rejectAppeal = null, // Configuration for rejecting an appeal
        public ?FlagRequest $flag = null,
        public ?EscalatePayload $escalate = null, // Configuration for escalation action
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
