<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $first
 * @property int $last
 * @property int $max
 * @property int $min
 * @property \DateTime $startTs
 */
class ParticipantCountByMinuteResponse extends BaseModel
{
    public function __construct(
        public ?int $first = null,
        public ?int $last = null,
        public ?int $max = null,
        public ?int $min = null,
        public ?\DateTime $startTs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
