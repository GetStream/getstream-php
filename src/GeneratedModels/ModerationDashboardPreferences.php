<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationDashboardPreferences extends BaseModel
{
    public function __construct(
        public ?OverviewDashboardConfig $overviewDashboard = null,
        public ?bool $mediaQueueBlurEnabled = null,
        public ?bool $flagUserOnFlaggedContent = null,
        public ?bool $disableFlaggingReviewedEntity = null,
        public ?array $allowedModerationActionReasons = null,
        public ?bool $asyncReviewQueueUpsert = null,
        public ?bool $disableAuditLogs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
