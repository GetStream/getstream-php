<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ThreadUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?ThreadResponse $thread = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null,
        public ?string $channelType = null,
        public ?string $channelID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
