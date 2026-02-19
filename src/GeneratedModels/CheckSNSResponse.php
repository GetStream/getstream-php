<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckSNSResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $status = null, // Validation result. One of: ok, error
        public ?string $error = null, // Error text
        public ?object $data = null, // Error data
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
