<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReportByHistogramBucket extends BaseModel
{
    public function __construct(
        public ?string $category = null,
        public ?int $count = null,
        public ?int $sum = null,
        public ?Bound $lowerBound = null,
        public ?Bound $upperBound = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
