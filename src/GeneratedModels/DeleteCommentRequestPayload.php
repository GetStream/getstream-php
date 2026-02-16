<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for comment deletion action
 */
class DeleteCommentRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to permanently delete the comment
        public ?string $reason = null, // Reason for deletion
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
