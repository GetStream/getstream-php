<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BroadcastDailyRollup extends BaseModel
{
    public function __construct(
        public ?string $schemaVersion = null,
        public ?string $day = null,
        public ?string $note = null,
        public ?int $broadcasts = null,
        public ?float $hoursWatched = null,
        public ?int $uniqueViewersSum = null,
        public ?int $maxPeakConcurrentViewers = null,
        public ?PoorByCause $poorViewersByCause = null,
        public ?int $sourceDrops = null,
        public ?int $deadAirS = null,
        public ?int $incidentWindows = null,
        /** @var array<TopBroadcast>|null */
        #[ArrayOf(TopBroadcast::class)]
        public ?array $topBroadcasts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
