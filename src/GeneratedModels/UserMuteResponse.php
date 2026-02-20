<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserMuteResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?UserResponse $target = null,
        public ?\DateTime $expires = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
