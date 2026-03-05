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
        public ?MetricStats $usersDaily = null,
        public ?MetricStats $messagesDaily = null,
        public ?MetricStats $translationsDaily = null,
        public ?MetricStats $imageModerationsDaily = null,
        public ?MetricStats $concurrentUsers = null,
        public ?MetricStats $concurrentConnections = null,
        public ?MetricStats $usersTotal = null,
        public ?MetricStats $usersLast24Hours = null,
        public ?MetricStats $usersLast30Days = null,
        public ?MetricStats $usersMonthToDate = null,
        public ?MetricStats $usersEngagedLast30Days = null,
        public ?MetricStats $usersEngagedMonthToDate = null,
        public ?MetricStats $messagesTotal = null,
        public ?MetricStats $messagesLast24Hours = null,
        public ?MetricStats $messagesLast30Days = null,
        public ?MetricStats $messagesMonthToDate = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
