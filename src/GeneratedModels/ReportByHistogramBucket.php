<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReportByHistogramBucket extends BaseModel
{
    public function __construct(
        public ?string $category = null,
        public ?Bound $lowerBound = null,
        public ?Bound $upperBound = null,
        public ?float $sum = null,
        public ?int $count = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
