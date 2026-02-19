<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DailyAggregateCallDurationReportResponse extends BaseModel
{
    public function __construct(
        public ?CallDurationReport $report = null,
        public ?string $date = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
