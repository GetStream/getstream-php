<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
