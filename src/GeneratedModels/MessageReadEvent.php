<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelID
 * @property string $channelType
 * @property string $cid
 * @property \DateTime $createdAt
 * @property string $type
 * @property \DateTime|null $channelLastMessageAt
 * @property string|null $lastReadMessageID
 * @property string|null $team
 * @property ChannelResponse|null $channel
 * @property ThreadResponse|null $thread
 * @property UserResponseCommonFields|null $user
 */
class MessageReadEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?\DateTime $channelLastMessageAt = null,
        public ?string $lastReadMessageID = null,
        public ?string $team = null,
        public ?ChannelResponse $channel = null,
        public ?ThreadResponse $thread = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
