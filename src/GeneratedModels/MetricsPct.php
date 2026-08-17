<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MetricsPct extends BaseModel
{
    public function __construct(
        public ?float $qualityScore = null,
        public ?float $jitter = null,
        public ?float $latency = null,
        public ?float $freezes = null,
        public ?float $geo = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
