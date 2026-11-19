<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The stored moderator correction
 */
class SubmitAgentFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Feedback row id
        public ?string $itemID = null, // Review queue item the correction is about
        public ?string $agentReviewID = null, // Nora review this correction is about
        public ?string $noraAction = null, // Policy action Nora recommended
        public ?string $moderatorAction = null, // Action the moderator took
        public ?string $reason = null, // Why the moderator disagreed
        public ?string $improvement = null, // How similar cases should be judged
        public ?array $labels = null, // Labels Nora matched on this review
        public ?string $entityType = null, // Entity type of the queue item
        public ?string $contentExcerpt = null, // Text of the item when the correction was saved
        public ?string $createdBy = null, // Moderator who submitted the correction
        public ?\DateTime $createdAt = null, // When the correction was first saved
        public ?\DateTime $updatedAt = null, // When the correction was last saved
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
