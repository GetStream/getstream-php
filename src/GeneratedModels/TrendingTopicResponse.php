<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A trending topic with its score for the user
 */
class TrendingTopicResponse extends BaseModel
{
    public function __construct(
        public ?string $tag = null, // The topic tag
        public ?float $score = null, // The trend of the tag scaled by the user's interest in it
        public ?bool $promoted = null, // Whether an active promotion contains the tag
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
