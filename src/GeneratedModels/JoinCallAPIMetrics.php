<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class JoinCallAPIMetrics extends BaseModel
{
    public function __construct(
        public ?int $total = null,
        public ?int $failures = null,
        public ?ActiveCallsLatencyStats $latency = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
