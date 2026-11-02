<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationFeedbackSubmissionResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // When the submission was made
        public ?string $reviewQueueItemID = null, // Review queue item the feedback is about
        public ?string $reporterID = null, // Moderator who submitted the feedback
        public ?string $entityType = null, // Type of the moderated entity
        public ?string $entityID = null, // ID of the moderated entity
        public ?int $itemCount = null, // Number of items in the submission, matching the filter or not
        public ?int $matchedCount = null, // Number of items in the submission that match the filter, including those left out by item_limit
        public ?int $sentCount = null, // Number of items in the submission that Bodyguard accepted
        public ?array $currentLabels = null, // Distinct labels the submission's items had
        public ?array $expectedLabels = null, // Distinct labels the moderator expected across the submission's items
        /** @var array<ModerationFeedbackItemResponse>|null */
        #[ArrayOf(ModerationFeedbackItemResponse::class)]
        public ?array $items = null, // The submission's items that match the filter
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
