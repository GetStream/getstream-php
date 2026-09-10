<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedGroupScope extends BaseModel
{
    public function __construct(
        public ?array $include = null, // Select only activities that live in a feed belonging to one of these feed groups. Mutually exclusive with exclude
        public ?array $exclude = null, // Select activities from every feed group except these. An activity cross-posted to an excluded and a non-excluded group is still selected. Mutually exclusive with include
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
