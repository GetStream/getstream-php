<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EdgeResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $latencyTestUrl = null,
        public ?int $green = null,
        public ?int $yellow = null,
        public ?int $red = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?string $subdivisionIsoCode = null,
        public ?string $countryIsoCode = null,
        public ?string $continentCode = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
