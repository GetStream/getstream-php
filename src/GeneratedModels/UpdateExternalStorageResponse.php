<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class UpdateExternalStorageResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?string $bucket = null,
        public ?string $path = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
