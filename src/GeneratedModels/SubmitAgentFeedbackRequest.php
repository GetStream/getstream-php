<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Moderator correction of Nora's review of one queue item
 */
class SubmitAgentFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?string $itemID = null, // Review queue item Nora reviewed
        public ?string $moderatorAction = null, // Action the moderator took
        public ?string $reason = null, // Why the moderator disagreed, up to 2000 characters
        public ?string $improvement = null, // How similar cases should be judged, up to 2000 characters
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
