<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The unread information from channels with a specific type.
 */
class UnreadCountsChannelType extends BaseModel
{
    public function __construct(
        public ?string $channelType = null, // The channel type.
        public ?int $channelCount = null, // The number of unread channels of this channel type.
        public ?int $unreadCount = null, // The number of unread messages of all the channels with this type.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
