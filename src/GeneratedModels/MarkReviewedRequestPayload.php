<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for mark reviewed action
 */
class MarkReviewedRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $disableMarkingContentAsReviewed = null, // Skip marking content as reviewed
        public ?int $contentToMarkAsReviewedLimit = null, // Maximum content items to mark as reviewed
        public ?string $decisionReason = null, // Reason for the appeal decision
        public ?string $reason = null, // Internal moderator note, stored on the action log and returned by QueryModerationLogs. Not shown to the appealing user; use decision_reason for that
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
