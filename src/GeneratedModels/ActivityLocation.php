<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $lat
 * @property int $lng
 */
class ActivityLocation extends BaseModel
{
    public function __construct(
        public ?int $lat = null, // Latitude coordinate
        public ?int $lng = null, // Longitude coordinate
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
