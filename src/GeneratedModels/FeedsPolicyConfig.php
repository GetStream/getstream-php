<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsPolicyConfig extends BaseModel
{
    public function __construct(
        public ?int $maxAgeHours = null,
        public ?array $feedGroups = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
