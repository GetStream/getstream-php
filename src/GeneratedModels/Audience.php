<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Audience extends BaseModel
{
    public function __construct(
        public ?int $peakConcurrentViewers = null,
        public ?string $peakAt = null,
        public ?int $avgConcurrentViewers = null,
        public ?int $uniqueViewers = null,
        public ?int $viewerConnections = null,
        public ?float $hoursWatched = null,
        public ?int $rampUpMinTo90pctPeak = null,
        public ?float $retentionAtMidpoint = null,
        public ?float $retentionAt90pctMark = null,
        public ?string $shape = null,
        /** @var array<ConcurrencyMinute>|null */
        #[ArrayOf(ConcurrencyMinute::class)]
        public ?array $concurrencyByMinute = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
