<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitModerationFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $reviewQueueItemID = null, // Review queue item the feedback was applied to
        public ?array $falsePositiveFlags = null, // IDs of the item's flags marked as false positives after this request
        public ?string $feedbackID = null, // ID of the first stored feedback item, when any was stored
        public ?array $feedbackItemIds = null, // IDs of the stored feedback items, one per submitted item
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
