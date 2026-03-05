<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // Message ID
        public ?string $userID = null, // User ID
        public ?UserResponse $user = null,
        public ?string $type = null, // Type of reaction
        public ?int $score = null, // Score of the reaction
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?object $custom = null, // Custom data for this object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
