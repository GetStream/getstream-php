<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $progress
 * @property int $statsChannelsCreated
 * @property \DateTime $statsCompletedAt
 * @property int $statsMessagesSent
 * @property \DateTime $statsStartedAt
 * @property int $statsUsersRead
 * @property int $statsUsersSent
 */
class CampaignStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $progress = null,
        public ?int $statsChannelsCreated = null,
        public ?\DateTime $statsCompletedAt = null,
        public ?int $statsMessagesSent = null,
        public ?\DateTime $statsStartedAt = null,
        public ?int $statsUsersRead = null,
        public ?int $statsUsersSent = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
