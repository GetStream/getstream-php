<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsMapLocation extends BaseModel
{
    public function __construct(
        public ?int $count = null,
        public ?int $liveCount = null,
        public ?CallStatsLocation $location = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
