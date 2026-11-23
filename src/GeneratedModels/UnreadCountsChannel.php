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
        public ?bool $hasUnread = null, // Whether the channel counts as unread for the user: it has messages newer than the user's last read, or the user marked it unread without a message (soft_unread). It is true for soft-unread channels even though unread_count is 0. Large channels have no unread_count and only report this.
        public ?\DateTime $lastRead = null, // The date which the current user last read the channel.
        public ?bool $softUnread = null, // True when the user marked the channel unread without a message. unread_count stays 0, and the channel adds 1 to total_unread_count; clients should key off has_unread and this field rather than unread_count > 0.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
