<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityFilterConfig extends BaseModel
{
    public function __construct(
        public ?bool $excludeOwnerActivities = null, // When true, activities authored by the feed owner are excluded from feed reads
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
