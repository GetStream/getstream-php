<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Geographic coordinates
 */
class CoordinatesResponse extends BaseModel
{
    public function __construct(
        public ?float $latitude = null, // Latitude coordinate
        public ?float $longitude = null, // Longitude coordinate
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
