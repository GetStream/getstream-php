<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $total
 * @property int $unique
 * @property array<TrackStatsResponse>|null $byTrack
 */
class PublisherStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null,
        public ?int $unique = null,
        /** @var array<TrackStatsResponse>|null */
        #[ArrayOf(TrackStatsResponse::class)]
        public ?array $byTrack = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
