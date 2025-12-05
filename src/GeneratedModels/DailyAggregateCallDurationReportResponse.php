<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $date
 * @property CallDurationReport $report
 */
class DailyAggregateCallDurationReportResponse extends BaseModel
{
    public function __construct(
        public ?string $date = null,
        public ?CallDurationReport $report = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
