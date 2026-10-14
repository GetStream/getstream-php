<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The unread information of a channel.
 */
class UnreadCountsChannel extends BaseModel
{
    public function __construct(
        public ?string $channelID = null, // The channel CID (type:id).
        public ?int $unreadCount = null, // The number of unread messages inside the channel.
        public ?\DateTime $lastRead = null, // The date which the current user last read the channel.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
