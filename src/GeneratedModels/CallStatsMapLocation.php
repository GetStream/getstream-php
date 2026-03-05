<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsMapLocation extends BaseModel
{
    public function __construct(
        public ?CallStatsLocation $location = null,
        public ?int $count = null,
        public ?int $liveCount = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
