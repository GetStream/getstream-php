<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Quality extends BaseModel
{
    public function __construct(
        public ?ScoreBands $scoreBandsByConnectionPct = null,
        public ?ScoreBands $scoreBandsByWatchTimePct = null,
        public ?float $p5QualityScore = null,
        public ?float $p50QualityScore = null,
        public ?Percentiles $connectionAvgJitterMs = null,
        public ?Percentiles $connectionAvgLatencyMs = null,
        /** @var array<Incident>|null */
        #[ArrayOf(Incident::class)]
        public ?array $interruptionIncidents = null,
        public ?float $viewerInterruptionRatePct = null,
        public ?string $viewerInterruptionNote = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
