<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SharedLocation extends BaseModel
{
    public function __construct(
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?string $createdByDeviceID = null,
        public ?\DateTime $endAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
