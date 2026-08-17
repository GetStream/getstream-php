<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelMemberPartialResponse extends BaseModel
{
    public function __construct(
        public ?string $channelRole = null, // Role of the member in the channel
        public ?bool $notificationsMuted = null, // Whether the user muted notifications for this channel
        public ?object $custom = null, // Channel-member custom fields projected via `member_custom_include`
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
