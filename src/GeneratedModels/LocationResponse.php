<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Geographic location metadata
 */
class LocationResponse extends BaseModel
{
    public function __construct(
        public ?string $continentCode = null, // Continent code
        public ?string $countryIsoCode = null, // Country ISO code
        public ?string $subdivisionIsoCode = null, // Subdivision ISO code
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
