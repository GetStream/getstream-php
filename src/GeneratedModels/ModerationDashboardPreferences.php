<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationDashboardPreferences extends BaseModel
{
    public function __construct(
        public ?bool $mediaQueueBlurEnabled = null,
        public ?bool $flagUserOnFlaggedContent = null,
        public ?bool $disableFlaggingReviewedEntity = null,
        public ?array $allowedModerationActionReasons = null,
        public ?OverviewDashboardConfig $overviewDashboard = null,
        public ?bool $asyncReviewQueueUpsert = null,
        public ?bool $disableAuditLogs = null,
        public ?array $keyframeClassificationsMap = null,
        public ?array $escalationReasons = null,
        public ?bool $escalationQueueEnabled = null,
        public ?bool $includeAttachmentPayload = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
