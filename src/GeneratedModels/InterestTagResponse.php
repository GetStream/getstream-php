<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An interest tag of a user with its ranking weight and, for computed tags, how many distinct reacted-to activities carried it
 */
class InterestTagResponse extends BaseModel
{
    public function __construct(
        public ?string $tag = null, // The interest tag value
        public ?int $count = null, // Lifetime number of distinct reacted-to activities tagged with this value, without decay; 0 for manually set tags
        public ?float $weight = null, // Ranking weight between -1.0 and 1.0. Computed tags carry a recency-decayed weight in (0, 1.0]: the user's strongest tag is 1.0 and every other a proportional share
        public ?string $source = null, // How the tag was set: computed (from the user's reactions) or manual (through the API)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
