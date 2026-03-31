<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnfollowPair extends BaseModel
{
    public function __construct(
        public ?string $source = null, // Fully qualified ID of the source feed
        public ?string $target = null, // Fully qualified ID of the target feed
        public ?bool $keepHistory = null, // When true, activities from the unfollowed feed will remain in the source feed's timeline (default: false)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
