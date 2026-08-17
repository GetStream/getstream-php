<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkActionAppealsRequest extends BaseModel
{
    public function __construct(
        public ?array $appealIds = null, // List of appeal UUIDs to process
        public ?string $actionType = null, // Action to apply: unban, restore, unblock, mark_reviewed, or reject_appeal
        public ?UnbanActionRequestPayload $unban = null, // Configuration for unban moderation action
        public ?RestoreActionRequestPayload $restore = null, // Configuration for restore action
        public ?UnblockActionRequestPayload $unblock = null, // Configuration for unblock action
        public ?MarkReviewedRequestPayload $markReviewed = null, // Configuration for mark reviewed action
        public ?RejectAppealRequestPayload $rejectAppeal = null, // Configuration for rejecting an appeal
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
