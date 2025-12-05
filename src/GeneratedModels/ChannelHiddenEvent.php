<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelID
 * @property int $channelMemberCount
 * @property string $channelType
 * @property string $cid
 * @property bool $clearHistory
 * @property \DateTime $createdAt
 * @property string $type
 * @property ChannelResponse|null $channel
 * @property User|null $user
 */
class ChannelHiddenEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?bool $clearHistory = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?ChannelResponse $channel = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
