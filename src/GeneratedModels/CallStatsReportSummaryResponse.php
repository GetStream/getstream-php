<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsReportSummaryResponse extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?string $callSessionID = null,
        public ?\DateTime $firstStatsTime = null,
        public ?string $callStatus = null,
        public ?int $qualityScore = null,
        public ?int $minUserRating = null,
        public ?\DateTime $createdAt = null,
        public ?int $callDurationSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
