<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The created promotion
 */
class PromoteTopicsResponse extends BaseModel
{
    public function __construct(
        public ?PromotedTopicResponse $promotedTopic = null, // A set of topics promoted for the For You trend signal until it expires
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
