<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for mark reviewed action
 */
class MarkReviewedRequestPayload extends BaseModel
{
    public function __construct(
        public ?int $contentToMarkAsReviewedLimit = null, // Maximum content items to mark as reviewed
        public ?string $decisionReason = null, // Reason for the appeal decision
        public ?bool $disableMarkingContentAsReviewed = null, // Skip marking content as reviewed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
