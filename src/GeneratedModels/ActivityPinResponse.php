<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivityPinResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // When the pin was created 
        public ?string $feed = null,    // ID of the feed where activity is pinned 
        public ?\DateTime $updatedAt = null,    // When the pin was last updated 
        public ?ActivityResponse $activity = null,
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
