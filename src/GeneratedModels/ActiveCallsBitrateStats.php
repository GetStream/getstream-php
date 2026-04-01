<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActiveCallsBitrateStats extends BaseModel
{
    public function __construct(
        public ?float $p10 = null,
        public ?float $p50 = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
