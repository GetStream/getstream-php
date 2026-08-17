<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Usage statistics for a single team containing all 16 metrics
 */
class TeamUsageStats extends BaseModel
{
    public function __construct(
        public ?string $team = null, // Team identifier (empty string for users not assigned to any team)
        public ?MetricStats $usersDaily = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $messagesDaily = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $translationsDaily = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $imageModerationsDaily = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $concurrentUsers = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $concurrentConnections = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersTotal = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersLast24Hours = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersLast30Days = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersMonthToDate = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersEngagedLast30Days = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $usersEngagedMonthToDate = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $messagesTotal = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $messagesLast24Hours = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $messagesLast30Days = null, // Statistics for a single metric with optional daily breakdown
        public ?MetricStats $messagesMonthToDate = null, // Statistics for a single metric with optional daily breakdown
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
