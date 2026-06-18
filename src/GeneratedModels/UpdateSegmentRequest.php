<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateSegmentRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // The name of the segment (max 128 characters)
        public ?string $description = null, // The description of the segment (max 256 characters)
        public ?object $filter = null, // Filter to apply to the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
