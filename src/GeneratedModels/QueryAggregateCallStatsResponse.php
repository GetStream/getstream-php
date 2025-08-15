<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class QueryAggregateCallStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?CallDurationReportResponse $callDurationReport = null,
        public ?CallParticipantCountReportResponse $callParticipantCountReport = null,
        public ?CallsPerDayReportResponse $callsPerDayReport = null,
        public ?NetworkMetricsReportResponse $networkMetricsReport = null,
        public ?QualityScoreReportResponse $qualityScoreReport = null,
        public ?SDKUsageReportResponse $sdkUsageReport = null,
        public ?UserFeedbackReportResponse $userFeedbackReport = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
