<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StartCampaignRequest extends BaseModel
{
    public function __construct(
        public ?\DateTime $scheduledFor = null,
        public ?\DateTime $stopAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
