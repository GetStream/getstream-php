<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ViewerBehavior extends BaseModel
{
    public function __construct(
        public ?float $medianWatchMin = null,
        public ?float $p90WatchMin = null,
        public ?float $bounceRatePct = null,
        public ?float $returnVisitRatePct = null,
        public ?float $connectionsPerViewerMean = null,
        public ?int $connectionDurationP50S = null,
        public ?float $connectionsUnder30sPct = null,
        public ?string $note = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
