<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SFULocationResponse extends BaseModel
{
    public function __construct(
        public ?CoordinatesResponse $coordinates = null,
        public ?LocationResponse $location = null,
        public ?string $id = null,
        public ?string $datacenter = null,
        public ?int $count = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
