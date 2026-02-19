<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DailyAggregateQualityScoreReportResponse extends BaseModel
{
    public function __construct(
        public ?QualityScoreReport $report = null,
        public ?string $date = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
