<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for deleting the free-text poll answer a review item was raised for. Chat polls only. Deletion is permanent; the poll and other votes are kept.
 */
class DeletePollAnswerRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $reason = null, // Reason for deletion
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
