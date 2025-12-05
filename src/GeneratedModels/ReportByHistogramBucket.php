<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $category
 * @property int $count
 * @property int $sum
 * @property Bound|null $lowerBound
 * @property Bound|null $upperBound
 */
class ReportByHistogramBucket extends BaseModel
{
    public function __construct(
        public ?string $category = null,
        public ?int $count = null,
        public ?int $sum = null,
        public ?Bound $lowerBound = null,
        public ?Bound $upperBound = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
