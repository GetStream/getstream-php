<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $disableFlaggingReviewedEntity
 * @property bool|null $flagUserOnFlaggedContent
 * @property bool|null $mediaQueueBlurEnabled
 * @property array|null $allowedModerationActionReasons
 * @property OverviewDashboardConfig|null $overviewDashboard
 */
class ModerationDashboardPreferences extends BaseModel
{
    public function __construct(
        public ?bool $disableFlaggingReviewedEntity = null,
        public ?bool $flagUserOnFlaggedContent = null,
        public ?bool $mediaQueueBlurEnabled = null,
        public ?array $allowedModerationActionReasons = null,
        public ?OverviewDashboardConfig $overviewDashboard = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
