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
        public ?string $outcome = null, // What this write did to the user's reaction on this target. One of: created, replaced, unchanged. 'created' means a new reaction was written and nothing was replaced; 'replaced' means enforce_unique removed one or more of the user's other reaction types; 'unchanged' means the user already held this reaction type (its custom data may still have been updated). Without enforce_unique a user can hold several reaction types on one target, so 'created' then means 'this reaction type was newly added', not 'the user's first reaction on this target'.
        public ?string $previousReactionType = null, // The reaction type this write replaced, or null when nothing was replaced. Non-null exactly when outcome is 'replaced'. If enforce_unique removed several reactions — possible only for data created before enforce_unique was adopted — this is the most recently created one.
        public ?int $counterDelta = null, // The change this write made to the number of reactions the user holds on this target: 1 when outcome is 'created', 0 when it is 'replaced' or 'unchanged'. These endpoints never return -1; a successful delete-reaction call is what decrements the count. With enforce_unique this is the delta of the user's reaction on the target; without it, the delta of reactions of this type.
        public ?string $duration = null, // Duration of the request
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
