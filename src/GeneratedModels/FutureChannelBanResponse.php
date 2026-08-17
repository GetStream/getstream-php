<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FutureChannelBanResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null, // User response object
        public ?UserResponse $bannedBy = null, // User response object
        public ?\DateTime $expires = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
