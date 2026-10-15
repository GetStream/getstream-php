<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBanResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null, // User response object
        public ?\DateTime $createdAt = null,
        public ?array $scopes = null,
        public ?ChannelBanScopeResponse $channelBan = null,
        public ?ChannelBanScopeResponse $futureChannelBan = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
