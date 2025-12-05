<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $channelCount
 * @property string $channelType
 * @property int $unreadCount
 */
class UnreadCountsChannelType extends BaseModel
{
    public function __construct(
        public ?int $channelCount = null,
        public ?string $channelType = null,
        public ?int $unreadCount = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
