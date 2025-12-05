<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $latitude
 * @property int $longitude
 */
class Coordinates extends BaseModel
{
    public function __construct(
        public ?int $latitude = null,
        public ?int $longitude = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
