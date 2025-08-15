<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SortParamRequest extends BaseModel
{
    public function __construct(
        public ?int $direction = null,    // Direction of sorting, 1 for Ascending, -1 for Descending, default is 1 
        public ?string $field = null,    // Name of field to sort by 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
