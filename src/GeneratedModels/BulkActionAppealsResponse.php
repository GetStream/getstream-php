<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkActionAppealsResponse extends BaseModel
{
    public function __construct(
        /** @var array<BulkAppealResult>|null */
        #[ArrayOf(BulkAppealResult::class)]
        public ?array $results = null, // Successfully processed appeals
        /** @var array<BulkAppealError>|null */
        #[ArrayOf(BulkAppealError::class)]
        public ?array $errors = null, // Appeals that could not be processed, with per-item error messages
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
