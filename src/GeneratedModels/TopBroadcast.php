<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TopBroadcast extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?int $peakConcurrentViewers = null,
        public ?float $hoursWatched = null,
        public ?float $poorPct = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
