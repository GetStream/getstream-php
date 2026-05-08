<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $messageID = null,
        public ?string $userID = null,
        public ?UserResponse $user = null,
        public ?string $type = null,
        public ?int $score = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
