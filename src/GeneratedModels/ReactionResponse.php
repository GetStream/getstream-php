<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $messageID
 * @property int $score
 * @property string $type
 * @property \DateTime $updatedAt
 * @property string $userID
 * @property object $custom
 * @property UserResponse $user
 */
class ReactionResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null, // Message ID
        public ?int $score = null, // Score of the reaction
        public ?string $type = null, // Type of reaction
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?string $userID = null, // User ID
        public ?object $custom = null, // Custom data for this object
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
