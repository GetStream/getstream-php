<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeliveryZoneSegment extends BaseModel
{
    public function __construct(
        public ?string $key = null,
        public ?int $sessions = null,
        public ?float $sharePct = null,
        public ?float $watchSharePct = null,
        public ?float $avgQualityScore = null,
        public ?float $p5QualityScore = null,
        public ?float $poorPct = null,
        public ?bool $outlier = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
