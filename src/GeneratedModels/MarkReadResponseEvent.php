<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MarkReadResponseEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $cid = null,
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?\DateTime $channelLastMessageAt = null,
        public ?string $team = null,
        public ?UserResponseCommonFields $user = null,
        public ?ThreadResponse $thread = null,
        public ?\DateTime $createdAt = null,
        public ?string $lastReadMessageID = null,
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
