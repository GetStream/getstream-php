<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<DailyAggregateCallsPerDayReportResponse> $daily
 */
class CallsPerDayReportResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyAggregateCallsPerDayReportResponse>|null */
        #[ArrayOf(DailyAggregateCallsPerDayReportResponse::class)]
        public ?array $daily = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
