<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class QueryAggregateCallStatsResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?CallDurationReportResponse $callDurationReport = null,
        public ?CallParticipantCountReportResponse $callParticipantCountReport = null,
        public ?CallsPerDayReportResponse $callsPerDayReport = null,
        public ?NetworkMetricsReportResponse $networkMetricsReport = null,
        public ?QualityScoreReportResponse $qualityScoreReport = null,
        public ?SDKUsageReportResponse $sdkUsageReport = null,
        public ?UserFeedbackReportResponse $userFeedbackReport = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'call_duration_report' => $this->callDurationReport,
            'call_participant_count_report' => $this->callParticipantCountReport,
            'calls_per_day_report' => $this->callsPerDayReport,
            'network_metrics_report' => $this->networkMetricsReport,
            'quality_score_report' => $this->qualityScoreReport,
            'sdk_usage_report' => $this->sdkUsageReport,
            'user_feedback_report' => $this->userFeedbackReport,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(duration: $json['duration'] ?? null,
            callDurationReport: $json['call_duration_report'] ?? null,
            callParticipantCountReport: $json['call_participant_count_report'] ?? null,
            callsPerDayReport: $json['calls_per_day_report'] ?? null,
            networkMetricsReport: $json['network_metrics_report'] ?? null,
            qualityScoreReport: $json['quality_score_report'] ?? null,
            sdkUsageReport: $json['sdk_usage_report'] ?? null,
            userFeedbackReport: $json['user_feedback_report'] ?? null
        );
    }
} 
