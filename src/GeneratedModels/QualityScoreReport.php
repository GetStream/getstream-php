<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<ReportByHistogramBucket> $histogram
 */
class QualityScoreReport extends BaseModel
{
    public function __construct(
        /** @var array<ReportByHistogramBucket>|null */
        #[ArrayOf(ReportByHistogramBucket::class)]
        public ?array $histogram = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
