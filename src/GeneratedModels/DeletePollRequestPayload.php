<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for poll deletion action. Poll deletion is always permanent.
 */
class DeletePollRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $reason = null, // Reason for deletion
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
