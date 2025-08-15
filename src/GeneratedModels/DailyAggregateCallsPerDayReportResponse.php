<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DailyAggregateCallsPerDayReportResponse extends BaseModel
{
    public function __construct(
        public ?string $date = null,
        public ?CallsPerDayReport $report = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
