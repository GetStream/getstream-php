<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EdgeResponse extends BaseModel
{
    public function __construct(
        public ?string $continentCode = null,
        public ?string $countryIsoCode = null,
        public ?int $green = null,
        public ?string $id = null,
        public ?string $latencyTestUrl = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?int $red = null,
        public ?string $subdivisionIsoCode = null,
        public ?int $yellow = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
