<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TrackStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $trackType = null,
        public ?int $durationSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
