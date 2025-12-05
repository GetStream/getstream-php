<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $durationSeconds
 * @property string $trackType
 */
class TrackStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $durationSeconds = null,
        public ?string $trackType = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
