<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class UpdateExternalStorageResponse extends BaseModel
{
    public function __construct(
        public ?string $bucket = null,
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?string $name = null,
        public ?string $path = null,
        public ?string $type = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
