<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatReactionGroupUserResponse extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?UserResponse $user = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
