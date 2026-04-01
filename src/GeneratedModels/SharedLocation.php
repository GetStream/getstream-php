<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SharedLocation extends BaseModel
{
    public function __construct(
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?string $createdByDeviceID = null,
        public ?\DateTime $endAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
