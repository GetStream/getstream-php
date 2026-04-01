<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsLocation extends BaseModel
{
    public function __construct(
        public ?string $city = null,
        public ?string $subdivision = null,
        public ?string $country = null,
        public ?string $countryIsoCode = null,
        public ?string $continent = null,
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?int $accuracyRadiusMeters = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
