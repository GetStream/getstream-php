<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $count
 * @property \DateTime $startTs
 */
class CountByMinuteResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null,
        public ?\DateTime $startTs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
