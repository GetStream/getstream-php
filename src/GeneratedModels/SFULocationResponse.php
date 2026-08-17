<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SFULocationResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $datacenter = null,
        public ?LocationResponse $location = null, // Geographic location metadata
        public ?CoordinatesResponse $coordinates = null, // Geographic coordinates
        public ?int $count = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
