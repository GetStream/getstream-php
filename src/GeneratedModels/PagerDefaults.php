<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Resolved defaults for a nested pagination object.
 */
class PagerDefaults extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Number of records returned when `limit` is omitted.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
