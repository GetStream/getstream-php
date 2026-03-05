<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SortParamRequest extends BaseModel
{
    public function __construct(
        public ?string $field = null, // Name of field to sort by
        public ?string $type = null, // Type of field to sort by. Empty string or omitted means string type (default). One of: number, boolean
        public ?int $direction = null, // Direction of sorting, 1 for Ascending, -1 for Descending, default is 1. One of: -1, 1
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
