<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityPinResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?ActivityResponse $activity = null,
        public ?string $feed = null, // ID of the feed where activity is pinned
        public ?\DateTime $createdAt = null, // When the pin was created
        public ?\DateTime $updatedAt = null, // When the pin was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
