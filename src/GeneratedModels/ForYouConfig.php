<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForYouConfig extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Turns For You ranking on. Groups: only the non-aggregated 'foryou' group. Views: applies only when read on that group
        public ?string $preset = null, // Name of a registered ranking preset that stands in for 'score' when score is empty. One of: for_you_v2, hot
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
