<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $p50
 * @property int $p90
 */
class ActiveCallsLatencyStats extends BaseModel
{
    public function __construct(
        public ?int $p50 = null,
        public ?int $p90 = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
