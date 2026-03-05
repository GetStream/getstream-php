<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsReactionResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $activityID = null, // ID of the activity that was reacted to
        public ?string $commentID = null, // ID of the comment that was reacted to
        public ?string $type = null, // Type of reaction
        public ?object $custom = null, // Custom data for the reaction
        public ?\DateTime $createdAt = null, // When the reaction was created
        public ?\DateTime $updatedAt = null, // When the reaction was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
