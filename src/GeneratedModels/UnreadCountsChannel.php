<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelID
 * @property \DateTime $lastRead
 * @property int $unreadCount
 */
class UnreadCountsChannel extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?\DateTime $lastRead = null,
        public ?int $unreadCount = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
