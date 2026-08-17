<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PoorByCause extends BaseModel
{
    public function __construct(
        public ?int $delivery = null,
        public ?int $edge = null,
        public ?int $source = null,
        public ?int $isolatedLocal = null,
        public ?int $unattributed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
