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
 * @property \DateTime $createdAt
 * @property string $type
 * @property string|null $team
 * @property ChannelResponse|null $channel
 */
class ChannelDeletedEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?string $team = null,
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
