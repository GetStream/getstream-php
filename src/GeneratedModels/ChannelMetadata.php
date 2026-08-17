<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelMetadata extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?string $type = null,
        public ?string $id = null,
        public ?string $team = null,
        public ?int $memberCount = null,
        public ?int $messageCount = null,
        public ?\DateTime $lastMessageAt = null,
        public ?object $custom = null,
        public ?string $pushLevel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
