<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ThreadUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $receivedAt = null,
        public ?ThreadResponse $thread = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
