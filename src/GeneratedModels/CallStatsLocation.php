<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $accuracyRadiusMeters
 * @property string|null $city
 * @property string|null $continent
 * @property string|null $country
 * @property string|null $countryIsoCode
 * @property int|null $latitude
 * @property int|null $longitude
 * @property string|null $subdivision
 */
class CallStatsLocation extends BaseModel
{
    public function __construct(
        public ?int $accuracyRadiusMeters = null,
        public ?string $city = null,
        public ?string $continent = null,
        public ?string $country = null,
        public ?string $countryIsoCode = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?string $subdivision = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
