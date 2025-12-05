<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $maxPoints
 * @property \DateTime $since
 * @property int $stepSeconds
 * @property \DateTime $until
 */
class ParticipantSeriesTimeframe extends BaseModel
{
    public function __construct(
        public ?int $maxPoints = null,
        public ?\DateTime $since = null,
        public ?int $stepSeconds = null,
        public ?\DateTime $until = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
