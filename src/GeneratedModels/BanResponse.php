<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BanResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null, // Represents channel in chat
        public ?UserResponse $user = null, // User response object
        public ?\DateTime $expires = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?UserResponse $bannedBy = null, // User response object
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
