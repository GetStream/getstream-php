<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $callCid
 * @property int $callDurationSeconds
 * @property string $callSessionID
 * @property string $callStatus
 * @property \DateTime $firstStatsTime
 * @property \DateTime|null $createdAt
 * @property int|null $minUserRating
 * @property int|null $qualityScore
 */
class CallStatsReportSummaryResponse extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?int $callDurationSeconds = null,
        public ?string $callSessionID = null,
        public ?string $callStatus = null,
        public ?\DateTime $firstStatsTime = null,
        public ?\DateTime $createdAt = null,
        public ?int $minUserRating = null,
        public ?int $qualityScore = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
