<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkActionAppealsRequest extends BaseModel
{
    public function __construct(
        public ?array $appealIds = null, // List of appeal UUIDs to process
        public ?string $actionType = null, // Action to apply: unban, restore, unblock, mark_reviewed, or reject_appeal
        public ?UnbanActionRequestPayload $unban = null,
        public ?RestoreActionRequestPayload $restore = null,
        public ?UnblockActionRequestPayload $unblock = null,
        public ?MarkReviewedRequestPayload $markReviewed = null,
        public ?RejectAppealRequestPayload $rejectAppeal = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
