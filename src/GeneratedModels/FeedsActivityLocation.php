<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsActivityLocation extends BaseModel
{
    public function __construct(
        public ?float $lat = null,
        public ?float $lng = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
