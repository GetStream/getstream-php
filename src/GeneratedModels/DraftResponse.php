<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DraftResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?DraftPayloadResponse $message = null,
        public ?MessageResponse $parentMessage = null,
        public ?MessageResponse $quotedMessage = null,
        public ?string $channelCid = null,
        public ?string $parentID = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
