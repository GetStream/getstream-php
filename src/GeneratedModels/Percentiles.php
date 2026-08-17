<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Percentiles extends BaseModel
{
    public function __construct(
        public ?float $p50 = null,
        public ?float $p95 = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
