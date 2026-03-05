<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckS3AccessResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?bool $success = null, // Whether the S3 access check succeeded
        public ?string $message = null, // Descriptive message about the check result
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
