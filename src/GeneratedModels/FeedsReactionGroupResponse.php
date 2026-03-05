<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsReactionGroupResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null, // Number of reactions in this group
        public ?\DateTime $firstReactionAt = null, // Time of the first reaction
        public ?\DateTime $lastReactionAt = null, // Time of the most recent reaction
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
