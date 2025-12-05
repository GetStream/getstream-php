<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $activityID
 * @property \DateTime $createdAt
 * @property string $type
 * @property \DateTime $updatedAt
 * @property UserResponse $user
 * @property string|null $commentID
 * @property object|null $custom
 */
class FeedsReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $activityID = null, // ID of the activity that was reacted to
        public ?\DateTime $createdAt = null, // When the reaction was created
        public ?string $type = null, // Type of reaction
        public ?\DateTime $updatedAt = null, // When the reaction was last updated
        public ?UserResponse $user = null,
        public ?string $commentID = null, // ID of the comment that was reacted to
        public ?object $custom = null, // Custom data for the reaction
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
