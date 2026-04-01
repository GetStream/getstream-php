<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CampaignStatsResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $statsStartedAt = null,
        public ?\DateTime $statsCompletedAt = null,
        public ?int $statsMessagesSent = null,
        public ?int $statsChannelsCreated = null,
        public ?float $progress = null,
        public ?int $statsUsersSent = null,
        public ?int $statsUsersRead = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
