<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $continentCode
 * @property string $countryIsoCode
 * @property string $subdivisionIsoCode
 */
class Location extends BaseModel
{
    public function __construct(
        public ?string $continentCode = null,
        public ?string $countryIsoCode = null,
        public ?string $subdivisionIsoCode = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
