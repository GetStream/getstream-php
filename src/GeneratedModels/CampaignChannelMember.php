<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $userID
 * @property string|null $channelRole
 * @property object|null $custom
 */
class CampaignChannelMember extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?string $channelRole = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
