<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 * @property CampaignResponse|null $campaign
 */
class CampaignCompletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?CampaignResponse $campaign = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
