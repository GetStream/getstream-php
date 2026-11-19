<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllSectionError extends BaseModel
{
    public function __construct(
        public ?string $code = null, // Error code. backend_timeout and backend_unavailable are retryable; unsupported (the app's configuration cannot serve this section) and internal_error are not
        public ?string $message = null, // Human-readable description of the failure
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
