<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatDraftResponse extends BaseModel
{
    public function __construct(
        public ?ChatDraftPayloadResponse $message = null,
        public ?string $channelCid = null,
        public ?string $parentID = null,
        public ?ChatMessageResponse $parentMessage = null,
        public ?ChatMessageResponse $quotedMessage = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
