<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Contains information about a user who reacted with this reaction type.
 */
class ReactionGroupUserResponse extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // The ID of the user who reacted.
        public ?UserResponse $user = null,
        public ?\DateTime $createdAt = null, // The time when the user reacted.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
