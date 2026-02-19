<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelMemberRequest extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?string $channelRole = null, // Role of the member in the channel
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
