<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkDeleteActionConfigResponse extends BaseModel
{
    public function __construct(
        public ?int $deleted = null, // Number of action configs deleted
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
