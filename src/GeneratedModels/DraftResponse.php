<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelCid
 * @property \DateTime $createdAt
 * @property DraftPayloadResponse $message
 * @property string|null $parentID
 * @property ChannelResponse|null $channel
 * @property MessageResponse|null $parentMessage
 * @property MessageResponse|null $quotedMessage
 */
class DraftResponse extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?DraftPayloadResponse $message = null,
        public ?string $parentID = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $parentMessage = null,
        public ?MessageResponse $quotedMessage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
